<?php

/**
 * Номера портов GPIO для подключённых устройств
 * @return array
 */
return [
    /** Идентификатор устройства температурного датчика */
    'temperatureSensorDeviceId' => '28-000005464e04',

    /** Нагревательный элемент */
    'heatingElement' => [
        'h2' => 7,
        'wpi' => 1,
        'physical' => 12
    ],

    /** Насос  */
    'pumpElement' => [
        'h2' => 198,
        'wpi' => 15,
        'physical' => 8
    ],

    /** Элемент охлаждения */
    'coolingElement' => '19'
];
