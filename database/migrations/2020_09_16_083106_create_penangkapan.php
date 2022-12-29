<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenangkapan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penangkapan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('jenis_alat_penangkap_id');
            $table->unsignedBigInteger('jenisikan_id');
            $table->bigInteger('jumlah_tangkapan');
            $table->unsignedBigInteger('jeniskapal_id');
            $table->bigInteger('nilai')->default(0)->comment('Nilai (Rp.)');
            $table->double('produksi')->default(0)->comment('Produksi (Kg.)');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('jenis_alat_penangkap_id')->references('id')->on('jenis_alat_penangkap');
            $table->foreign('jenisikan_id')->references('id')->on('jenisikan');
            $table->foreign('jeniskapal_id')->references('id')->on('jeniskapal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penangkapan');
    }
}
