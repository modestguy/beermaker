<?php
namespace App\Model\System\Elements;

/**
 * Класс "Нагревательный элемент"
 */
class HeatingElement extends BaseElement {

    protected function gpioNumber(): int
    {
        return config('gpio.heatingElement.wpi');
    }
}
