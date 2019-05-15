<?php

use App\Recipe;
use App\TemperaturePause;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemperaturePauseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(TemperaturePause::getTableName(), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('recipe_id')->unsigned()->nullable(false)->comment('Рецепт');
            $table->integer('temperature')->nullable(false)->comment('Температура в градусах');
            $table->integer('duration')->nullable(false)->comment('Длительность паузы в секундах');
            $table->boolean('enable_pump')->nullable(false)->comment('Работа насоса');
            $table->timestamps();
        });

        Schema::table(TemperaturePause::getTableName(), function (Blueprint $table) {
            $table->foreign('recipe_id')->references('id')->on(Recipe::getTableName());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(TemperaturePause::getTableName(), function (Blueprint $table) {
            $table->dropForeign(['recipe_id']);
        });

        Schema::dropIfExists(TemperaturePause::getTableName());
    }
}
