<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PemakaianMtr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemakaian_mtr', function (Blueprint $table) {
            $table->increments('ID_Sistem');
            $table->integer('Material_ID')->nullable();
            $table->integer('Master_Order_ID')->nullable();
            $table->integer('Quantity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemakaian_mtr');
    }
}
