<?php
namespace App\Http\Controllers;

use App\Model\System\ProcessHandler;

class ApiController extends Controller {

    /**
     * Возвращает текущую температуру с датчика
     * @return array
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function temperature()
    {
        /** @var ProcessHandler $processHandler */
        $processHandler = app()->make('process');
        $temperature = $processHandler->getGPIOHandler()->temperatureSensor()->getCurrentTemperature();
        return compact('temperature');
    }

    /**
     * Активность насоса
     * @return array
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function pumpActivity()
    {
        /** @var ProcessHandler $processHandler */
        $processHandler = app()->make('process');
        $active = $processHandler->getGPIOHandler()->pumpElement()->isActive();
        return compact('active');
    }

    public function heatActivity()
    {
        /** @var ProcessHandler $processHandler */
        $processHandler = app()->make('process');
        $active = $processHandler->getGPIOHandler()->heatingElement()->isActive();
        return compact('active');
    }

    public function currentProcess()
    {
        /** @var ProcessHandler $processHandler */
        $processHandler = app()->make('process');
        $currentProcess = $processHandler->isActiveProcess();
        return compact('currentProcess');
    }

    /**
     * Нагрев
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function heatingOn()
    {
        /** @var ProcessHandler $processHandler */
        $processHandler = app()->make('process');
        return $processHandler->getGPIOHandler()->heatingElement()->start();
    }

    public function heatingOff()
    {
        /** @var ProcessHandler $processHandler */
        $processHandler = app()->make('process');
        $processHandler->getGPIOHandler()->heatingElement()->stop();
    }

    public function processName()
    {
        $processName = 'Выключен';

        /** @var ProcessHandler $processHandler */
        $processHandler = app()->make('process');
        if ($processHandler->isHeating())
            $processName = 'Нагрев';

        if ($processHandler->isStableState())
            $processName = 'Температурная пауза';

        return compact('processName');
    }
}
