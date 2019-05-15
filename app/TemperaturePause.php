<?php
namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Класс "Температурная пауза"
 * @property int $id
 * @property int $recipe_id Идентификатор рецепта
 * @property Recipe $recipe Рецепт
 * @property int $temperature Температура в градусах
 * @property int $duration  Длительность паузы в секундах
 * @property bool $enable_pump Работа насоса
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class TemperaturePause extends BaseModel {

    protected $table = 'temperature_pause';

    /**
     * @return BelongsTo
     */
    public function recipe() : BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }
}
