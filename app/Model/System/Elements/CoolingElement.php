<?php
namespace App\Model\System\Elements;

/**
 * Охлаждающий элемент
 */
class CoolingElement extends BaseElement {

    protected function gpioNumber(): int
    {
        return config('gpio.coolingElement');
    }
}
