<?php
namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Класс "Рецепт приготовления пива"
 * @property int $id Идентификатор рецепта
 * @property string $name Название рецепта
 * @property string $description Описание рецепта
 * @property string $description2 Дополнительное описание
 * @property TemperaturePause[] $temperaturePauses Температурные паузы для рецепта
 * @property HopsAlert[] $hopsAlerts Оповещения по хмелю при кипячении
 * @property int $boiling_time Длительность кипячения пива в секундах
 */
class Recipe extends BaseModel {

    protected $table = 'recipe';

    /**
     * Температурные паузы
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function temperaturePauses() : HasMany
    {
        return $this->hasMany(TemperaturePause::class);
    }

    /**
     * Оповещения по хмелю при кипячении
     * @return HasMany
     */
    public function hopsAlerts() : HasMany
    {
        return $this->hasMany(HopsAlert::class);
    }
}
