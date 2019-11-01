<?php

namespace App\Http\Middleware;

use App\Permissions;
use Closure;

class checkWndAdmin
{
    public $acceptedRoles = [
        Permissions::ROLE_SUPERADMIN => Permissions::ROLE_SUPERADMIN,
        Permissions::ROLE_WND => Permissions::ROLE_WND ,
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if((new Permissions())->checkUser($this->acceptedRoles))
        {
            return $next($request);
        }
        abort(403, 'У вас нет доступа для просмотра данной страницы');
    }
}
