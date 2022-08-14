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
        Schema::create('detail_syarat', function (Blueprint $table) {
            $table->id('id_detail_syarat');

						$table->foreignId('id_petugas')->nullable();
            $table->foreign('id_petugas')->references('id_petugas')->on('petugas')->onDelete('cascade');
						
						$table->foreignId('id_pengunjung');
            $table->foreign('id_pengunjung')->references('id_pengunjung')->on('pengunjung')->onDelete('cascade');
						
						$table->foreignId('id_jenis_syarat');
            $table->foreign('id_jenis_syarat')->references('id_jenis_syarat')->on('jenis_syarat')->onDelete('cascade');

						$table->timestamp('tanggal_verifikasi')->nullable();

						$table->string('file_syarat', 45);
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
        Schema::dropIfExists('detail_syarat');
    }
};
