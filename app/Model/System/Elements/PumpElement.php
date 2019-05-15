<?php
namespace App\Model\System;

use App\Model\System\Elements\BaseElement;

/**
 * Насос
 */
class PumpElement extends BaseElement
{
    protected function gpioNumber(): int
    {
        return config('gpio.pumpElement.wpi');
    }
}
