<?php
namespace App\Enum;

use App\BaseModel;

/**
 * Абстрактный класс для всех перечислимых моделей
 * @property int $id
 * @property string $name
 */
abstract class BaseEnum extends BaseModel
{
    public $timestamps = false;
}
