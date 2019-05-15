<?php

use App\Enum\BrewState;
use App\Enum\ProcessState;
use App\Model\BrewProcess;
use App\Recipe;
use App\TemperaturePause;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrewProcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(BrewProcess::getTableName(), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('process_state_id')->unsigned()->nullable(false)->default(ProcessState::STOPPED);
            $table->bigInteger('brew_state_id')->unsigned()->nullable(false)->default(BrewState::UNSET);
            $table->bigInteger('recipe_id')->unsigned()->nullable(false);
            $table->bigInteger('temperature_pause_id')->unsigned()->nullable(true)->default(null);
            $table->timestamps();
        });

        Schema::table(BrewProcess::getTableName(), function(Blueprint $table) {
            $table->foreign('process_state_id')->references('id')->on(ProcessState::getTableName());
            $table->foreign('brew_state_id')->references('id')->on(BrewState::getTableName());
            $table->foreign('recipe_id')->references('id')->on(Recipe::getTableName());
            $table->foreign('temperature_pause_id')->references('id')->on(TemperaturePause::getTableName());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(BrewProcess::getTableName(), function (Blueprint $table) {
            $table->dropForeign(['temperature_pause_id']);
            $table->dropForeign(['recipe_id']);
            $table->dropForeign(['brew_state_id']);
            $table->dropForeign(['process_state_id']);
        });

        Schema::dropIfExists(BrewProcess::getTableName());
    }
}
