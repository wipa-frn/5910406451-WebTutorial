<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
//setting middlweare
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
        \App\Http\Middleware\CheckForMaintenanceMode::class, 
        //when request url then check ->ex. php artisan down ทำให้เว็บเรา down '503 Service Unavailable' เหมือนดาวน์ระบบ
        // storage/framework/down
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        
        \App\Http\Middleware\TrimStrings::class, //trim data form input -> cut space in stadrt and end

        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class, //convert empty str -> NULL 
        \App\Http\Middleware\TrustProxies::class, //network..
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class, //encrypt cookie
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class, //เอาข้อมูลในคุกกี้ใส่ไปใน response
            \Illuminate\Session\Middleware\StartSession::class, // ปกติเก็บแบบ state less เลยต้องมี session
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class, //validate แล้วมี error พอไปหน้า view ก็ไปดึง error ใน session แล้ว flush ออกมาแสดง
            \App\Http\Middleware\VerifyCsrfToken::class, //ขเพื่อให้มั่นใจว่า้อมูลที่รีเควสมาจาก user มาจากเว็บเรา
            \Illuminate\Routing\Middleware\SubstituteBindings::class, 
        ],

        //ไม่ต้องป้องกัน Csrf เพราะใช้กับ api fb
        'api' => [
            'throttle:60,1', //ยิง request รัวๆ ไม่ให้เกิน 60 วิ ต่อนาที 
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
        \Illuminate\Session\Middleware\AuthenticateSession::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        \Illuminate\Auth\Middleware\Authorize::class,
    ];
}
