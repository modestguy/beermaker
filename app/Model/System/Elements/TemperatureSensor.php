<?php
namespace App\Model\System\Elements;


/**
 * Класс "Температурный датчик"
 */
class TemperatureSensor {

    /**
     * Текущая температура с датчика
     * @var float
     */
    private $currentTemperature = -1;

    /**
     * Текущая температура с датчика
     * @return float
     */
    public function getCurrentTemperature() : float {
        try {
            $base_dir = '/sys/bus/w1/devices/';
            $device_folder = glob($base_dir . '28*')[0];
            $device_file = $device_folder . '/w1_slave';

            $data = file($device_file, FILE_IGNORE_NEW_LINES);

            if (preg_match('/YES$/', $data[0])) {
                if (preg_match('/t=(\d+)$/', $data[1], $matches, PREG_OFFSET_CAPTURE)) {
                    $this->currentTemperature = $matches[1][0] / 1000;
                }
            }
        } catch (\Exception $e)
        {
            //---
        }


        return $this->currentTemperature;
    }
}
