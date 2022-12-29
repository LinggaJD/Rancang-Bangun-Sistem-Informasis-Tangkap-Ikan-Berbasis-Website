<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class LoginAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,...$roles)
    {

        $user = DB::table('users')
                        ->select('*','users.id as uid')
                        ->leftJoin('role_user','users.id','=','role_user.user_id')
                        ->leftJoin('role','role_user.role_id','=','role.id')
                        ->where('users.id', session()->get('id_user'))
                        ->first();


        if(session()->has('id_user')) {
            if(in_array($user->role, $roles)) {
                return $next($request);
            } else {
                return redirect(route('auth.index'));
            }
        } else {
            return redirect(route('auth.index'));
        }
    }
}
