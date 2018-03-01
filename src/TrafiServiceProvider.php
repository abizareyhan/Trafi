<?php

namespace Abizareyhan\Trafi;

use Illuminate\Support\ServiceProvider;

class TrafiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      if(function_exists('config_path')){
          //If is not a Lumen App...
          $this->publishes([
              __DIR__ . '/config/trafi.php' => config_path('trafi.php'),
          ]);
          $this->mergeConfigFrom(
              __DIR__ . '/config/trafi.php', 'trafi'
          );
      }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->singleton('Trafi', function(){
          $trafi = new Trafi(new CurlHTTPClient, config('trafi.city'));
          $trafi->setHttpClient(new Client());
          $trafi->setHttpMessageFactory(new HttpGuzzleMessageFactory());
          return $trafi;
      });

      $this->app->alias('Trafi', 'trafi');
    }
}
