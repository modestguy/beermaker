<?php
namespace App\Model\System\Elements;

abstract class BaseElement
{
    /**
     * @var IOState
     */
    protected $ioState;

    public function __construct()
    {
        $this->ioState = new IOState();
        shell_exec("gpio -g mode {$this->gpioNumber()} out");
    }

    protected abstract function gpioNumber() : int;

    /**
     * Текущее состояние
     * @var bool
     */
    protected $currentState = false;

    /**
     * Старт элемента
     */
    public function start()
    {
        $this->currentState = true;
        $this->ioState::put($this->gpioNumber(), $this->currentState);

        shell_exec("gpio write " . $this->gpioNumber() . " 1");
    }

    /**
     * Остановка элемента
     */
    public function stop()
    {
        $this->currentState = false;
        $this->ioState::put($this->gpioNumber(), $this->currentState);

        shell_exec("gpio write " . $this->gpioNumber() . " 0");
    }

    /**
     * Активно ли текущее состояние
     * @return bool
     */
    public function isActive() : bool
    {
        return $this->ioState::get($this->gpioNumber());
    }
}
