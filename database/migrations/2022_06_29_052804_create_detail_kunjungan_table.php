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
            $table->id();

						$table->foreignId('pengunjung_id')->nullable();
            $table->foreign('pengunjung_id')->references('id')->on('pengunjung')->onDelete('cascade');
						
						$table->foreignId('kunjungan_id')->nullable();
            $table->foreign('kunjungan_id')->references('id')->on('kunjungan')->onDelete('cascade');

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
