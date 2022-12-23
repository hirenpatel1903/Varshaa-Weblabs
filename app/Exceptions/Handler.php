<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        $environment = App::environment();
        if($environment !='local'){
            if ($this->isHttpException($exception)) {
                if ($exception->getStatusCode() == 404) {
                    return redirect()->route('404notfound');
                }
            }

            if ($exception instanceof AuthorizationException) {
                return redirect()->route('401unauthorized');
            }

            if ($exception instanceof \ErrorException) {
                return redirect()->route('500error');
            } else {
                return parent::render($request, $exception);
            }
        }

        return parent::render($request, $exception);
    }
}
