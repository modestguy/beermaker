<?php
namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

/**
 * Класс "Текущие настройки пивоварни"
 * @property int $id Идентификатор настройки
 * @property int $gpio Номер пина
 * @property boolean $state Текущее состояние
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Settings extends BaseModel
{
    protected $table = 'settings';

    /**
     * @param Builder $query
     * @param int $gpio
     * @return Builder
     */
    public function scopeByGpio(Builder  $query, int $gpio) : Builder
    {
        return $query->where('gpio', $gpio);
    }
}
