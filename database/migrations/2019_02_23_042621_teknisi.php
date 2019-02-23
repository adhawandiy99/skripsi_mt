<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class Teknisi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teknisi', function (Blueprint $table) {
            $table->increments('ID_Sistem');
            $table->string('NIK', 25)->nullable();
            $table->string('Nama', 75)->nullable();
            $table->string('No_HP', 12)->nullable();
            $table->string('Username', 35)->nullable();
            $table->string('Password', 35)->nullable();
            $table->string('Level', 25)->nullable();
        });
        DB::table('teknisi')->insert([
            "NIK"   => "17920262",
            "Nama"   => "Riswandi",
            "No_HP"   => "0811511441",
            "Username"   => "wandiy99",
            "Password"   => "f6c8797c76370bf3436c4de79db32ace",
            "Level"   => "1",
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teknisi');
    }
}
