<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\Http\JsonResponse;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Intervention\Image\Exception\NotReadableException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    	\Illuminate\Database\Eloquent\ModelNotFoundException::class,
    	
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
    public function render($request, Exception $e)
    {
        if ($request->expectsJson()) {
            return new JsonResponse(
                $this->convertExceptionToArray($e),
                $this->isHttpException($e) ? $e->getStatusCode() : 500,
                $this->isHttpException($e) ? $e->getHeaders() : [],
                JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES
            );
        }
        
        if ($e instanceof NotFoundHttpException) {
            return response()->view('Error.404', [] , 404);
        }
        
        if ($e instanceof \PDOException) {
            return response()->view('Error.504', [] , 500);
        }

        if ($e instanceof MethodNotAllowedHttpException) {
            return response()->view('Error.504', [] , 500);
        }

        if ($e instanceof \ErrorException) {
            return response()->view('Error.504', [] , 500);
        }

        if ($e instanceof NotReadableException) {
            return response()->view('Error.504', [] , 500);
        }
        
        if ($e instanceof ConnectException){
            return response()->view('Error.504', [] , 500);
        }

        if ($e instanceof TokenMismatchException){
          return response()->view('Error.token', 500);
        }
        
        return parent::render($request, $e);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest(route('login'));
    }
    
    protected function convertExceptionToArray(Exception $e)
    {
        return config('app.debug') ? [
            'message' => $e->getMessage(),
            'exception' => get_class($e),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => collect($e->getTrace())->map(function ($trace) {
                return Arr::except($trace, ['args']);
            })->all(),
        ] : [
            'message' => $this->isHttpException($e) ? $e->getMessage() : 'Server Error',
        ];
    }
    
    protected function isHttpException(Exception $e)
    {
        return $e instanceof HttpExceptionInterface;
    }
}
