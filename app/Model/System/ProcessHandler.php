<?php
namespace App\Model\System;

/**
 * Класс "Уравление процессами"
 */
class ProcessHandler {

    /**
     *
     * @var GPIOHandler
     */
    private $gpioHandler;

    /**
     * Признак, что поддерживается температурный режим
     * @var bool
     */
    private static $stableState = false;

    /**
     * Конструктор состояний
     * ProcessHandler constructor.
     * @param GPIOHandler $handler
     */
    public function __construct(GPIOHandler $handler)
    {
        $this->gpioHandler = $handler;
    }

    /**
     * Возвращает GPIO handler
     * @return GPIOHandler
     */
    public function getGPIOHandler()
    {
        return $this->gpioHandler;
    }

    /**
     * Остановка всех элементов
     */
    public function stopAllElements()
    {
        $this->gpioHandler->heatingElement()->stop();
    }

    /**
     * Процесс нагревания до определённой температуры
     * @param int $temperature
     * @param int $heatingTimeout
     */
    public function heat(int $temperature, int $heatingTimeout = null)
    {
        if (is_null($heatingTimeout))
            $heatingTimeout = config('process.heatingTimeout');

        if (!$this->gpioHandler->heatingElement()->isActive())
            $this->gpioHandler->heatingElement()->start();


        $currentTemperature = $this->gpioHandler
            ->temperatureSensor()->getCurrentTemperature();
        while ($currentTemperature < $temperature)
        {
            sleep($heatingTimeout);
            $currentTemperature = $this->gpioHandler
                ->temperatureSensor()->getCurrentTemperature();
        }

        $this->gpioHandler->heatingElement()->stop();
    }

    /**
     * Проверяет, что идёт нагревание
     * @return bool
     */
    public function isHeating() : bool
    {
        return !self::$stableState && $this->gpioHandler->heatingElement()->isActive();
    }

    /**
     * Процесс охлаждения до определённой температуры
     * @param int $temperature
     * @param int $coolingTimeout
     */
    public function cool(int $temperature, int $coolingTimeout = null)
    {
        if (is_null($coolingTimeout))
            $coolingTimeout = config('process.coolingTimeout');

        if (!$this->gpioHandler->coolingElement()->isActive())
            $this->gpioHandler->coolingElement()->start();

        $currentTemperature = $this->gpioHandler
            ->temperatureSensor()->getCurrentTemperature();
        while ($currentTemperature > $temperature)
        {
            sleep($coolingTimeout);
            $currentTemperature = $this->gpioHandler
                ->temperatureSensor()->getCurrentTemperature();
        }

        $this->gpioHandler->coolingElement()->stop();
    }

    /**
     * Идёт процесс охлаждения
     * @return bool
     */
    public function isCooling() : bool
    {
        return !self::$stableState && $this->gpioHandler->coolingElement()->isActive();
    }

    /**
     * Признак что темпераатурный режим - поддержание температуры
     * @return bool
     */
    public function isStableState() : bool
    {
        return self::$stableState;
    }

    /**
     * Показывает, что в данный момент идёт какой-то процесс
     * @return bool
     */
    public function isActiveProcess() : bool
    {
        return $this->isHeating()
            || $this->isStableState();
    }

    /**
     * Процесс поддержания температуры
     * @param int $temperature Поддерживаемая температура
     * @param int $seconds Время поддерживаемой температуры в секундах
     * @param int $stableTimeout Таймаут опроса температурного датчика
     * @param int $diffDegrees Разница в градусах, при которой включать нагревательный элемент
     */
    public function stableTemperature(
        int $temperature,
        int $seconds,
        int $stableTimeout = null,
        int $diffDegrees = 1
    )
    {
        self::$stableState = true;

        if (is_null($stableTimeout))
            $stableTimeout = config('process.stableTimeout');

        $this->stopAllElements();

        $start = time();
        do {
            $currentTemperature = $this->gpioHandler->temperatureSensor()->getCurrentTemperature();
            if ($currentTemperature < ($temperature - $diffDegrees))
                $this->heat($temperature);

            sleep($stableTimeout);
            $diff = time() - $start;
        } while ($diff < $seconds);

        self::$stableState = false;
        $this->stopAllElements();
    }
}
