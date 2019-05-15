<?php
namespace App\Enum;

/**
 * Состояние процесса пивоварения
 */
class ProcessState extends BaseEnum
{
    protected $table = 'process_state';

    /**
     * Процесс не запущен
     * @const int
     */
    const STOPPED = 1;

    /**
     * Процесс идёт
     * @const int
     */
    const PENDING = 2;

    /**
     * Процесс завершён
     * @const int
     */
    const FINISHED = 3;

    /**
     * Процесс отменён
     * @const int
     */
    const CANCELLED = 4;
}
