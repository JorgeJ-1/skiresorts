<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableSkiresortsAlterColUserIdNotNull extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema:: table('skiresorts', function (Blueprint $table)
        {
            $table->bigInteger('user_id')->nullable(false)->change();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema:: table('skiresorts', function (Blueprint $table)
        {
            $table->bigInteger('user_id')->nullable()->change();
        });
    }
}
