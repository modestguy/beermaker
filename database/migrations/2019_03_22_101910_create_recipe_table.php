<?php

use App\Recipe;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Recipe::getTableName(), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('description')->nullable(false);
            $table->text('description2')->nullable(false);
            $table->bigInteger('boiling_time')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Recipe::getTableName());
    }
}
