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
            $table->id();

						$table->foreignId('petugas_id')->nullable();
            $table->foreign('petugas_id')->references('id')->on('petugas')->onDelete('cascade');
						
						$table->foreignId('pengunjung_id')->nullable();
            $table->foreign('pengunjung_id')->references('id')->on('pengunjung')->onDelete('cascade');
						
						$table->foreignId('jenis_syarat_id')->nullable();
            $table->foreign('jenis_syarat_id')->references('id')->on('jenis_syarat')->onDelete('cascade');

						$table->timestamp('tanggal_verifikasi');

						$table->string('file_syarat');
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
