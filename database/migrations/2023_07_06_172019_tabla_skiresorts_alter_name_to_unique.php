<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaSkiresortsAlterNameToUnique extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skiresorts', function (Blueprint $table) {
            //
            $table->unique('name',false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skiresorts', function (Blueprint $table) {
            //
            $table->dropunique('name');
        });
    }
}

