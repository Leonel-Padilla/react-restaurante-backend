<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Class LoggerController
 * @package App\Http\Controllers
 */

class LoggerController extends Controller
{

    public function postLog(Request $request)
    {
        Log::channel('logger')->info("El usuario $request->usuario intento acceder a la pantalla $request->pantalla");
    }

}
