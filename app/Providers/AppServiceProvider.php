<?php

namespace App\Providers;

use App\Model\System\Elements\CoolingElement;
use App\Model\System\Elements\HeatingElement;
use App\Model\System\Elements\TemperatureSensor;
use App\Model\System\GPIOHandler;
use App\Model\System\ProcessHandler;
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
        $temperatureSensor = new TemperatureSensor();
        $coolingElement = new CoolingElement();
        $heatingElement = new HeatingElement();

        $gpioHandler = new GPIOHandler();
        $gpioHandler->setTemperatureSensor($temperatureSensor);
        $gpioHandler->setCoolingElement($coolingElement);
        $gpioHandler->setHeatingElement($heatingElement);

        $this->app->bind('process', function() use ($gpioHandler){
            return new ProcessHandler($gpioHandler);
        });
    }
}
