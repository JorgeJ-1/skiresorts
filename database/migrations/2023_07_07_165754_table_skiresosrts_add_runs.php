<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableSkiresosrtsAddRuns extends Migration
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
            $table->integer('runs')->after('slopeKms') ->nullable();
            $table->integer('openRuns')->after('runs') ->nullable();
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
            $table->dropColumn('runs');
            $table->dropColumn('openRuns');
        });
    }
}
