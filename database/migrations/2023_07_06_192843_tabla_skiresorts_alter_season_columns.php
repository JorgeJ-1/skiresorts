<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaSkiresortsAlterSeasonColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema:: table('skiresorts', function (Blueprint $table)
        {
            $table->string('seasonStart', 64)->after('isOpen') ->nullable();
            $table->string('seasonEnd', 64)->after('seasonStart') ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema:: table('skiresorts', function (Blueprint $table)
        {
            $table->dropColumn('seasonStart');
            $table->dropColumn('seasonEnd');
        });
    }
}
