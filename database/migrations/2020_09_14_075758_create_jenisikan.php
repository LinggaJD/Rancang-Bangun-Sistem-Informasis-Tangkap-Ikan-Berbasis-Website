<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisikan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenisikan', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_ikan');
            $table->string('kode_fao');
            $table->string('jenis_perairan');
            $table->string('hias');
            $table->string('kelompok');
            $table->string('kelompok_besar');
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
        Schema::dropIfExists('jenisikan');
    }
}
