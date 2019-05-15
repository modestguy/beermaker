<?php
namespace App\Enum;

/**
 * Состояние варки
 */
class BrewState extends BaseEnum
{
    protected $table = 'brew_state';

    /**
     * Не задано
     * @const int
     */
    const UNSET = 1;

    /**
     * Затирание сусла
     * @const int
     */
    const MASHING = 2;

    /**
     * Процесс варки
     * @const int
     */
    const BREW = 3;
}
