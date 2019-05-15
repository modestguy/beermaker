<?php

use App\Enum\BrewState;
use App\Enum\ProcessState;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnumTables extends Migration
{
    private function insertData()
    {
        ProcessState::query()->insert([
            ['id' => ProcessState::STOPPED, 'name' => 'Процесс не начат'],
            ['id' => ProcessState::PENDING, 'name' => 'Процесс идёт'],
            ['id' => ProcessState::FINISHED, 'name' => 'Процесс завершён'],
            ['id' => ProcessState::CANCELLED, 'name' => 'Процесс отменён']
        ]);

        BrewState::query()->insert([
            ['id' => BrewState::UNSET, 'name' => 'Не задан'],
            ['id' => BrewState::MASHING, 'name' => 'Затирание сусла'],
            ['id' => BrewState::BREW, 'name' => 'Варка']
        ]);
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create( ProcessState::getTableName(), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        Schema::create(BrewState::getTableName(), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        $this->insertData();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(BrewState::getTableName());
        Schema::dropIfExists(ProcessState::getTableName());
    }
}
