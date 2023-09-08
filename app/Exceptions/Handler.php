<?php

namespace App\Exceptions;

use BadMethodCallException;
use Error;
use ErrorException;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Jiannei\Response\Laravel\Support\Facades\Response;
use Throwable;
use function Symfony\Component\String\b;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if($request->acceptsJson()){
            $msg = '';
            $code = 0;
            switch ($e){
                case $e instanceof BadMethodCallException:
                case $e instanceof ValidationException:
                case $e instanceof ModelNotFoundException:
                    $msg = $e->getMessage();
                    break;
                case $e instanceof ErrorException:
                case $e instanceof MassAssignmentException:
                    $code = 500;
            }
            dd($e);
            return response()->json([
                'code' => $code,
                'message' => $msg,
                'data'   => [],
            ]);
//            return Response::fail($msg,200);
        }
        return parent::render($request, $e); // TODO: Change the autogenerated stub
    }
}
