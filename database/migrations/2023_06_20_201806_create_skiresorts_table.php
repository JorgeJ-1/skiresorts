<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkiresortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skiresorts', function (Blueprint $table) {
            $table->id();
            $table->string('town',256);
            $table->string('country',256);
            $table->integer('lifts');
            $table->integer('slopeKms');
            $table->boolean('isOpen');
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
        Schema::dropIfExists('skiresorts');
    }
}
