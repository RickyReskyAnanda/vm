<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['nama_lengkap'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'activation_key' => $data['activation_key'],
            'key_pw' => base64_encode($data['password']),
            'active' => 0,
        ]);
    }

    /**
     * Override default register method from RegistersUsers trait
     *
     * @param array $request
     * @return redirect to $redirectTo
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $cekEmail = User::where('email',$request->email)->count();
        //add activation_key to the $request array
        $activation_key = $this->getToken();
        $request->request->add(['activation_key' => $activation_key]);

        $user = $this->create($request->all());

        //$this->guard()->login($user);

        //write a code for send email to a user with activation link
        $data = array('name' => $request['nama_lengkap'], 'email' => $request['email'],  'activation_link' => url('/activation/' . $activation_key));

        Mail::send('emails.users.verifikasi', $data, function($message) use ($data) {
            $message->to($data['email'])
                    ->subject('Activate Your Account');
            $message->from('info@ceklokasi.id');
        });

        return redirect()->back()->with('reg_pesan', 'Kami telah mengirimkan link aktivasi di email Anda. Silahkan verifikasi akun Anda.');
    }

    /**
     * Generate a unique token
     *
     * @return unique token
     */
    public function getToken() {
        return hash_hmac('sha256', str_random(40), config('app.key'));
    }

    /**
     * Activate the user account
     *
     * @param string $key
     * @return redirect to login page
     */
    public function activation($key)
    {
        $auth_user = User::where('activation_key', $key)->first();

        if($auth_user) {
            $auth_user->active = '1';
            $auth_user->save();
            return redirect('/')->with('reg_pesan', 'Akun Anda telah aktif. Anda bisa login sekarang.');
        } else {
            return redirect('/')->with('reg_error', 'Kode aktifasi salah.');
        }
    }
}
