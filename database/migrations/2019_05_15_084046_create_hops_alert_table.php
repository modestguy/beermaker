<?php

use App\HopsAlert;
use App\Recipe;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHopsAlertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create(HopsAlert::getTableName(), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('recipe_id')->unsigned()->nullable(false)->comment('Идентификатор рецепта');
            $table->integer('time')->comment('Время оповещения о внесении хмеля');
            $table->timestamps();
        });

        Schema::table(HopsAlert::getTableName(), function (Blueprint $table) {
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
        Schema::table(HopsAlert::getTableName(), function (Blueprint $table) {
           $table->dropForeign(['recipe_id']);
        });

        Schema::dropIfExists(HopsAlert::getTableName());
    }
}
