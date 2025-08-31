<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Middleware global (puedes dejarlo vacío por ahora)
     */
    protected $middleware = [];

    /**
     * Middleware para grupos de rutas
     */
    protected $middlewareGroups = [
        'api' => [
            'throttle:api',                     // Limita peticiones
            \Illuminate\Routing\Middleware\SubstituteBindings::class, // Vincula rutas a modelos
        ],
    ];

    /**
     * Middleware disponibles por ruta
     */
    protected $routeMiddleware = [
        'auth' => \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class, // Para proteger rutas
    ];
}
