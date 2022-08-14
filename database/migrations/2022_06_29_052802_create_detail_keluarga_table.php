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
        Schema::create('detail_keluarga', function (Blueprint $table) {
            $table->id('id_detail_keluarga');

						$table->foreignId('id_pengunjung');
            $table->foreign('id_pengunjung')->references('id_pengunjung')->on('pengunjung')->onDelete('cascade');
						
						$table->foreignId('id_warga_rutan');
            $table->foreign('id_warga_rutan')->references('id_warga_rutan')->on('warga_rutan')->onDelete('cascade');

            $table->string('status_keluarga', 45);
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
        Schema::dropIfExists('detail_keluarga');
    }
};
