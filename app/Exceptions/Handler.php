<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Throwable;

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

    /*
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $e
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */

    public function render($request, Throwable $e)
    {
        if ($e instanceof ModelNotFoundException) {
            return response()->json([
                'message' => 'Sem resultados para sua pesquisa'
            ], Response::HTTP_NOT_FOUND);
        }

        if ($e instanceof ValidationException) {
            return $this->convertValidationExceptionToResponse($e, $request);
        }

        return parent::render($request, $e);
    }

    protected function convertValidationExceptionToResponse(ValidationException $e, $request): JsonResponse
    {
        $errors = $e->validator->errors()->getMessages();

        return response()->json(['errors' => $errors], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
