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
        Schema::create('jadwal_kunjungan', function (Blueprint $table) {
            $table->id('id_jadwal_kunjungan');

						$table->foreignId('id_petugas');
            $table->foreign('id_petugas')->references('id_petugas')->on('petugas')->onDelete('cascade');

						$table->string('hari', 10);
						$table->time('jam_mulai', $precision = 0);
						$table->time('jam_selesai', $precision = 0);
						$table->string('kapasitas', 45);
						$table->enum('status', ['y', 't']);
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
        Schema::dropIfExists('jadwal_kunjungan');
    }
};
