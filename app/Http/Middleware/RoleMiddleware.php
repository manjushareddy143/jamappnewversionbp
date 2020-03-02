<?php

namespace App\Http\Middleware;

use App\Role;
use App\Traits\HasRolesAndPermissions;
use Closure;
use Spatie\Permission\Traits\HasRoles;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  $role
     * @param null $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {

        if(!auth()->user()->hasRole($role))
        {
            abort(404);
        }
        if($permission !== null && !auth()->user()->can($permission))
        {
            abort(404);
        }
        return $next($request);
    }
}
