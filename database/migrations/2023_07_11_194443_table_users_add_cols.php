<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableUsersAddCols extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema:: table('users', function (Blueprint $table)
        {
            $table->date('bornDate') ->after('email') ->nullable();
            $table->string('country',256) ->after('email') ->nullable();
            $table->string('town',256) ->after('email') ->nullable();
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
        Schema:: table('users', function (Blueprint $table)
        {
            $table->dropColumn('town');
            $table->dropColumn('country');
            $table->dropColumn('bornDate');
        });
    }
}
