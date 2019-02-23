<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MasterOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_order', function (Blueprint $table) {
            $table->increments('ID_Sistem');
            $table->string('No_Tiket', 20)->nullable();
            $table->longText('Headline')->nullable();
            $table->string('PIC', 50)->nullable();
            $table->longText('Alamat')->nullable();
            $table->string('Wilayah', 50)->nullable();
            $table->integer('Teknisi_ID')->nullable();
            $table->string('Status', 25)->nullable();
            $table->longText('Foto_Pekerjaan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_order');
    }
}
