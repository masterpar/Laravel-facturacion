<?php

namespace App\Exceptions;

use Exception;
use App\Traits\ApiResponser;
use Illuminate\Database\QueryException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Exceptions\unauthenticated;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{

    use ApiResponser;
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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

   

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {

                // verifica errores de laravel en formato Json
         if ($exception instanceof ValidationException) {
            return $this->convertValidationExceptionToResponse($exception, $request);
         }

            //verifica si existe el dato en la base de datos envie error en Json
         if ($exception instanceof ModelNotFoundException) {
            $modelo = strtolower(class_basename($exception->getModel()));
             return $this->errorResponse("no existe ninguna instancia de {$modelo} con el id especificado",404);
         }

         // Verifica si el usuario esta autenticado de lo contrario envía error en Json 
         if ($exception instanceof AuthenticationException) {
            return $this->unauthenticated($request, $$exception);
        }

            // el ususario no tiene autoización a esta página de lo contrario envía error en Json 
        if ($exception instanceof AuthorizationException) {
            return $this->errorResponse('No posee autorización',403);
        }
            // url no existe de lo contrario envía error en Json 
        if ($exception instanceof NotFoundHttpException) {
            return $this->errorResponse('No se encontro la Url especificada',404);
        }

           // Verifica el metodo (POST|GET|PUT) petición si es el correcto de lo contrario envía error en Json 
        if ($exception instanceof MethodNotAllowedHttpException) {
            return $this->errorResponse('El metodo especificado en la petición no es valido',405);
        }

          // envía cualquier otro error en Json 
        if ($exception instanceof HttpException) {
            return $this->errorResponse($exception->getMessage(), $exceptions->getStatusCode());
        }



          // error al eliminar un recurso que esta relacionado con otro
        if ($exception instanceof QueryException) {
            $codigo = $exception->errorInfo[1];

            if($codigo == 1451){
            return $this->errorResponse('No se puede eliminar de forma permantente este recurso  por que está relacionado con otro', 409);
        }

    }
            //verifica si el archivo config/app -> 'debug' se encuentra en false
        if (config('app.debug')){
           return parent::render($request, $exception);
                }

                
          // Verifica otro error no contemplado en la Api
         return $this->errorResponse('Falla Inesperada. Intente luego', 500);
        
    }



            // --------------------  Funciones ------------------------   

        // verifica si el usuario esta autenticado
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return $this->errorResponse('No autenticado',201);
    }

   
        // envia errores en formato Json
    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
        
        return $this->errorResponse($e->errors(),422);
    }
}
