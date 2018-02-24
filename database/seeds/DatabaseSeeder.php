<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 3; $i++) { 
            DB::table('admins')->insert([
                'name' => 'Ricky Resky Ananda',
                'username' => 'admin'.$i,
                'password' => bcrypt('admin'.$i),
                'remember_token' => csrf_token(),
                'updated_at'=>date('Y-m-d h:i:s'),
                'created_at'=>date('Y-m-d h:i:s'),
            ]);
        }
    }
}
