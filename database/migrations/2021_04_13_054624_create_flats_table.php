<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->index();
            $table->decimal('price')->index();
            $table->tinyInteger('bedrooms')->index();
            $table->tinyInteger('bathrooms')->index();
            $table->tinyInteger('storeys')->index();
            $table->tinyInteger('garages')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flats');
    }
}
