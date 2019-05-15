<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Абстрактный класс для всех моделей, имеющих таблицу в БД
 */
abstract class BaseModel extends Model
{
    public static function getTableName() : string
    {
        return ((new static)->getTable());
    }
}
