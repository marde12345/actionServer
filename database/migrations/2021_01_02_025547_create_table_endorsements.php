<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEndorsements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endorses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('inf_id')->nullable()->unsigned();
            $table->bigInteger('cust_id')->nullable()->unsigned();
            $table->bigInteger('plat_id')->nullable()->unsigned();
            $table->integer('days');


            $table->foreign('plat_id')->references('id')->on('platforms');
            $table->foreign('inf_id')->references('id')->on('users');
            $table->foreign('cust_id')->references('id')->on('users');
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
        Schema::dropIfExists('endorses');
    }
}
