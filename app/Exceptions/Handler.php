<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function handleApiExceptions($request, $exception)
    {
        if($exception instanceof ModelNotFoundException)
        {
            return response()->json(['error' => 'No es posible obtener el objeto solicitado'], 404);
        }

        if ($exception instanceof QueryException) {
            return response()->json(['error' => 'Oops ha ocurrido un error inesperado en el servidor'], 500);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json(['error' => 'Verbo no soportado para esta petición'], 405);
        }

        Log::warning("[Handler.handleApiExceptions] API Exception type '" . get_class($exception) . "' not handled.");
        return parent::render($request, $exception);
    }

    public function render($request, Throwable $exception)
    {
        if($request->expectsJson())
        {
            return $this->handleApiExceptions($request, $exception);
        }

        return parent::render($request, $exception);
    }


}
