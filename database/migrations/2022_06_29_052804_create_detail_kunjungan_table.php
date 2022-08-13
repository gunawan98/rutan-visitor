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
        Schema::create('detail_kunjungan', function (Blueprint $table) {
            $table->id('id_detail_kunjungan');

						$table->foreignId('id_pengunjung')->nullable();
            $table->foreign('id_pengunjung')->references('id_pengunjung')->on('pengunjung')->onDelete('cascade');
						
						$table->foreignId('id_kunjungan')->nullable();
            $table->foreign('id_kunjungan')->references('id_kunjungan')->on('kunjungan')->onDelete('cascade');

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
        Schema::dropIfExists('detail_kunjungan');
    }
};
