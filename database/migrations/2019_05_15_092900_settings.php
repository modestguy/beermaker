<?php

use App\Settings as SettingsTable;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Settings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(SettingsTable::getTableName(), function (Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('gpio')->nullable(false)->comment('Номер GPIO');
            $table->boolean('state')->default(false)->comment('Состояние');
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
        Schema::dropIfExists(SettingsTable::getTableName());
    }
}
