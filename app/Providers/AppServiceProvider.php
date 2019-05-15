<?php

namespace App\Providers;

use App\Model\System\Elements\HeatingElement;
use App\Model\System\Elements\TemperatureSensor;
use App\Model\System\GPIOHandler;
use App\Model\System\ProcessHandler;
use App\Model\System\PumpElement;
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
        $heatingElement = new HeatingElement();
        $pumpElement = new PumpElement();

        $gpioHandler = new GPIOHandler();
        $gpioHandler->setTemperatureSensor($temperatureSensor);
        $gpioHandler->setPumpElement($pumpElement);
        $gpioHandler->setHeatingElement($heatingElement);

        $this->app->bind('process', function() use ($gpioHandler){
            return new ProcessHandler($gpioHandler);
        });
    }
}
