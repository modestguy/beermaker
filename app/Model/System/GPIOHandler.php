<?php
namespace App\Model\System;

use App\Model\System\Elements\CoolingElement;
use App\Model\System\Elements\HeatingElement;
use App\Model\System\Elements\TemperatureSensor;

/**
 * Базовый класс для обмена с датчиками
 */
class GPIOHandler {

    /**
     * Нагревательный элемент
     * @var
     */
   private $heatingElement;

    /**
     * Температурный датчик
     * @var TemperatureSensor
     */
   private $temperatureSensor;

    /**
     * Охлаждающий элемент
     * @var CoolingElement
     */
   private $coolingElement;

   public function setTemperatureSensor(TemperatureSensor $temperatureSensor)
   {
     $this->temperatureSensor = $temperatureSensor;
   }

   public function setCoolingElement(CoolingElement $coolingElement)
   {
       $this->coolingElement = $coolingElement;
   }

   public function setHeatingElement(HeatingElement $heatingElement)
   {
       $this->heatingElement = $heatingElement;
   }

    /**
     * Возвращает температурный датчик
     * @return TemperatureSensor
     */
   public function temperatureSensor() : TemperatureSensor
   {
       return $this->temperatureSensor;
   }

    /**
     * Возвращает нагревательный элемент
     * @return HeatingElement
     */
   public function heatingElement() : HeatingElement
   {
        return $this->heatingElement;
   }

    /**
     * Охлаждающий элемент
     * @return CoolingElement
     */
   public function coolingElement() : CoolingElement
   {
       return $this->coolingElement;
   }
}
