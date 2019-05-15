<?php
namespace App\Model\System\Elements;

use App\Settings;

/**
 * Класс для записи текущего состояния пинов в базу
 *
 */
class IOState {

    /**
     * Записываем состояние gpio
     * @param int $gpio
     * @param bool $state
     */
    public static function put(int $gpio, bool $state)
    {
        $setting = Settings::byGpio($gpio)->get();
        if (!$setting)
            $setting = new Settings();

        $setting->gpio = $gpio;
        $setting->state = $state;
        $setting->save();
    }

    public static function get(int $gpio) : bool
    {
        $setting = Settings::byGpio($gpio)->get();
        return $setting ? $setting->state : false;
    }

}
