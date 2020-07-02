<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\TrustProxies::class,
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'checkAuth' => \App\Http\Middleware\checkAuth::class,
        'checkSession' => \App\Http\Middleware\checkSession::class,
        'parseAdmin' => \App\Http\Middleware\ParseAdmin::class,
        'checkAdminAuth' => \App\Http\Middleware\CheckAdminAuth::class,
        'okAdmin' => \App\Http\Middleware\checkOkAuth::class,
        'wndAdmin' => \App\Http\Middleware\checkWndAdmin::class,
        'senateAdmin' => \App\Http\Middleware\senateAdmin::class,
        'readingClubAdmin' => \App\Http\Middleware\ReadingClubAdmin::class,
        'superAdmin' => \App\Http\Middleware\checkSuperAdmin::class,
        'centcoinExcepts' => \App\Http\Middleware\centcoinExcepts::class,
        'cors' => \App\Http\Middleware\cors::class,
        'parseDomainAuth' => \App\Http\Middleware\parseDomainAuth::class,
    ];

    /**
     * The priority-sorted list of middleware.
     *
     * This forces non-global middleware to always be in the given order.
     *
     * @var array
     */
    protected $middlewarePriority = [
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\Authenticate::class,
        \Illuminate\Routing\Middleware\ThrottleRequests::class,
        \Illuminate\Session\Middleware\AuthenticateSession::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        \Illuminate\Auth\Middleware\Authorize::class,
        \App\Http\Middleware\checkAuth::class,
        \App\Http\Middleware\checkSession::class,
        \App\Http\Middleware\ParseAdmin::class,
        \App\Http\Middleware\checkWndAdmin::class,
        \App\Http\Middleware\CheckAdminAuth::class,
        \App\Http\Middleware\ReadingClubAdmin::class,
        \App\Http\Middleware\parseDomainAuth::class,
    ];
}
