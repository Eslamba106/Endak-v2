<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        {
            // Register your custom response functions here
            Response::macro('apiSuccess', function ($data = null, $message = 'success', $status = 200) {
                return response()->json([
                    'success' => true,
                    'message' => $message,
                    'status'=> $status,
                    'data' => $data,
                ], $status);
            });

            Response::macro('apiFail', function ($message = 'fail', $status = 404) {
                return response()->json([
                    'success' => false,
                    'message' => $message,
                    'status'=> $status
                ], $status);
            });
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
