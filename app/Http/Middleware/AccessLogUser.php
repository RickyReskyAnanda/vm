<?php
namespace App\Http\Middleware;
use Closure;
use DB;
use DateTime;
class AccessLogUser
{
  public function handle($request, Closure $next)
  {
    $response = $next($request);
    // buat log
    DB::table('access_log_user')->insert([
      'path' => $request->path(),
      'ip' => $request->getClientIp(),
      'created_at' => new DateTime,
      'updated_at' => new DateTime
    ]);
    return $response;
  }
}