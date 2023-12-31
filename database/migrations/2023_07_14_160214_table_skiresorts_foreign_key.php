<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableSkiresortsForeignKey extends Migration
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
            $table->foreign('user_id')
                   ->references('id')->on('users')
                   ->onUpdate('cascade')->onDelete('restrict'); 
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
            $table->dropForeign('skiresorts_user_id_foreign');
        });
        
    }
}
