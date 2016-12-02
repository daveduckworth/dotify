<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class SpotifyServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('GuzzleHttp\Client', function ($app) {
            $client = new Client([
                'base_uri' => 'https://api.spotify.com/v1/'
            ]);

            return $client;
        });
    }
}
