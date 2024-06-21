<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Knuckles\Scribe\Scribe;
use Knuckles\Camel\Extraction\ExtractedEndpointData;
use Laravel\Sanctum\Sanctum;
use Symfony\Component\HttpFoundation\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        if (class_exists(\Knuckles\Scribe\Scribe::class)) {
            Scribe::beforeResponseCall(function (Request $request, ExtractedEndpointData $endpointData) {
                $user = User::first();
                Sanctum::actingAs($user, ['*']);
            });
        }


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
