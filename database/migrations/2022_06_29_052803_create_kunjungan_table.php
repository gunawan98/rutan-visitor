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
            $table->id();

						$table->foreignId('petugas_id')->nullable();
            $table->foreign('petugas_id')->references('id')->on('petugas')->onDelete('cascade');

						$table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

						$table->foreignId('warga_rutan_id')->nullable();
            $table->foreign('warga_rutan_id')->references('id')->on('warga_rutan')->onDelete('cascade');

						$table->string('nama_pengunjung');
						$table->integer('jmh_pengikut_laki')->nullable();
						$table->integer('jmh_pengikut_perempuan')->nullable();
						$table->integer('jmh_pengikut_anak')->nullable();
						$table->integer('no_antrian');
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
