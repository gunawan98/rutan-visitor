<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kunjungan', function (Blueprint $table) {
            $table->id('id_kunjungan');

						$table->foreignId('id_jadwal_kunjungan')->nullable();
            $table->foreign('id_jadwal_kunjungan')->references('id_jadwal_kunjungan')->on('jadwal_kunjungan')->onDelete('cascade');

						$table->timestamp('tanggal_kunjungan');
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
        Schema::dropIfExists('kunjungan');
    }
};
