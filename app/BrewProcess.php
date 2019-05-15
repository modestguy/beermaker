<?php
namespace App\Model;

use App\BaseModel;
use App\Enum\BrewState;
use App\Enum\ProcessState;
use App\Recipe;
use App\TemperaturePause;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * Класс "Процесс варки пива"
 * @property int $id                    Первичный ключ
 * @property int $process_state_id      Идентификатор состояния процесса
 * @property ProcessState $processState Состояние процесса
 * @property int $brew_state_id         Идентификатор типа варки
 * @property BrewState $brewState       Тип варки
 * @property int $recipe_id             Идентификатор рецепта
 * @property Recipe $recipe             Рецепт
 * @property int $temperature_pause_id  Идентификатор текущей температурной паузы
 * @property TemperaturePause|null $temperaturePause Температурная пауза
 * @property Carbon $created_at         Дата создания
 * @property Carbon $updated_at         Дата обновления
 */
class BrewProcess extends BaseModel {

    protected $table = 'brew_process';

    /**
     * @return BelongsTo
     */
    public function processState()
    {
        return $this->belongsTo(ProcessState::class);
    }

    /**
     * @return BelongsTo
     */
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    /**
     * @return BelongsTo
     */
    public function brewState()
    {
        return $this->belongsTo(BrewState::class);
    }

    /**
     * @return BelongsTo|null
     */
    public function temperaturePause()
    {
        return $this->belongsTo(TemperaturePause::class);
    }
}
