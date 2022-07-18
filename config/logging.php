<?php

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that gets used when writing
    | messages to the logs. The name specified in this option should match
    | one of the channels defined in the "channels" configuration array.
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Deprecations Log Channel
    |--------------------------------------------------------------------------
    |
    | This option controls the log channel that should be used to log warnings
    | regarding deprecated PHP and library features. This allows you to get
    | your application ready for upcoming major versions of dependencies.
    |
    */

    'deprecations' => env('LOG_DEPRECATIONS_CHANNEL', 'null'),

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog",
    |                    "custom", "stack"
    |
    */

    'channels' => [
        'stack' => [
            'driver' => 'stack',
            'channels' => ['single'],
            'ignore_exceptions' => false,
        ],

        'single' => [
            'driver' => 'single',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
        ],

        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 14,
        ],

        'slack' => [
            'driver' => 'slack',
            'url' => env('LOG_SLACK_WEBHOOK_URL'),
            'username' => 'Laravel Log',
            'emoji' => ':boom:',
            'level' => env('LOG_LEVEL', 'critical'),
        ],

        'papertrail' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => SyslogUdpHandler::class,
            'handler_with' => [
                'host' => env('PAPERTRAIL_URL'),
                'port' => env('PAPERTRAIL_PORT'),
            ],
        ],

        'stderr' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => StreamHandler::class,
            'formatter' => env('LOG_STDERR_FORMATTER'),
            'with' => [
                'stream' => 'php://stderr',
            ],
        ],

        'syslog' => [
            'driver' => 'syslog',
            'level' => env('LOG_LEVEL', 'debug'),
        ],

        'errorlog' => [
            'driver' => 'errorlog',
            'level' => env('LOG_LEVEL', 'debug'),
        ],

        'null' => [
            'driver' => 'monolog',
            'handler' => NullHandler::class,
        ],

        'emergency' => [
            'path' => storage_path('logs/laravel.log'),
        ],

        'cargo' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log1 = 'logs/Cargo/Cargo-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log1),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'cargohistorial' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log2 = 'logs/CargoHistorial/CargoHistorial-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log2),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'cliente' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log3 = 'logs/Cliente/Cliente-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log3),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'comentario' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log4 = 'logs/Comentario/Comentario-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log4),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'compradetalle' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log5 = 'logs/CompraDetalle/CompraDetalle-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log5),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'compraencabezado' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log6 = 'logs/CompraEncabezado/CompraEncabezado-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log6),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'delivery' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log7 = 'logs/Delivery/Delivery-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log7),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'empleado' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log8 = 'logs/Empleado/Empleado-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log8),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'factura' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log9 = 'logs/Factura/Factura-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log9),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'formapago' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log10 = 'logs/FormaPago/FormaPago-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log10),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'impuesto' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log11 = 'logs/Impuesto/Impuesto-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log11),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'impuestohistorial' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log13 = 'logs/ImpuestoHistorial/ImpuestoHistorial-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log13),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'insumo' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log14 = 'logs/Insumo/Insumo-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log14),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'logger' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log32 = 'logs/Permisos/Permisos-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log32),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'mesa' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log15 = 'logs/Mesa/Mesa-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log15),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'ordendetalle' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log16 = 'logs/OrdenDetalle/OrdenDetalle-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log16),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'ordenencabezado' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log17 = 'logs/OrdenEncabezado/OrdenEncabezado-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log17),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'parametrosfactura' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log18 = 'logs/ParametrosFactura/ParametrosFactura-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log18),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'producto' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log19 = 'logs/Producto/Producto-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log19),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'productohistorial' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log20 = 'logs/ProductoHistorial/ProductoHistorial-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log20),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'productoinsumo' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log21 = 'logs/ProductoInsumo/ProductoInsumo-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log21),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'proveedor' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log22 = 'logs/Proveedor/Proveedor-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log22),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'reservacion' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log23 = 'logs/Reservacion/Reservacion-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log23),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'reservacionmesa' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log24 = 'logs/ReservacionMesa/ReservacionMesa-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log24),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'sucursal' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log25 = 'logs/Sucursal/Sucursal-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log25),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'sueldo' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log26 = 'logs/Sueldo/Sueldo-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log26),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'tipodocumento' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log27 = 'logs/TipoDocumento/TipoDocumento-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log27),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],
        
        'tipoentrega' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log28 = 'logs/TipoEntrega/TipoEntrega-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log28),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'rol' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log29 = 'logs/Rol/Rol-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log29),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'pantalla' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log30 = 'logs/Pantalla/Pantalla-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log30),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

        'rolPantalla' => [
            date_default_timezone_set("America/Tegucigalpa"),
            $tiempo = date('Ymd-his'),
            $log31 = 'logs/RolesPantalla/RolesPantalla-'.$tiempo.'.log', 
            'driver' => 'single',
            'path' => storage_path($log31),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 2,
        ],

    ],

];
