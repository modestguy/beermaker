<?php
namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Класс "Оповещения по хмелю"
 * @property int $id Идентификатор
 * @property int $recipe_id Идентификатор рецепта
 * @property Recipe $recipe Рецепт
 * @property int $time На какой минуте оповещать о внесении хмеля
 */
class HopsAlert extends BaseModel {
    /**
     * @var string
     */
    protected $table = 'hops_alert';

    /**
     * @return BelongsTo
     */
    public function recipe() : BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }
}
