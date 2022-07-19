<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->createResponseMacros();
    }

    /**
     * Create response macros.
     * How to use: response()->success("message", //data); response()->error("message", //data, //status)
     *
     *
     * @return void
     */
    protected function createResponseMacros(): void
    {
        Response::macro('success', function (string $message, $data = null) {
            $value = [
                'isError' => false,
                'message' => $message,
                'result' => $data
            ];
            return Response::make($value);
        });

        Response::macro('error', function (string $message, $errors = null, $status = 200) {
            $value = [
                'isError' => true,
                'message' => $message,
                'result' => $errors
            ];
            return Response::make($value, $status);
        });
    }
}
