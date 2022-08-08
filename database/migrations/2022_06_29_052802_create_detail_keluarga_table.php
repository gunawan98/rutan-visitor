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
            $table->id();

						$table->foreignId('pengunjung_id')->nullable();
            $table->foreign('pengunjung_id')->references('id')->on('pengunjung')->onDelete('cascade');
						
						$table->foreignId('warga_rutan_id')->nullable();
            $table->foreign('warga_rutan_id')->references('id')->on('warga_rutan')->onDelete('cascade');

            $table->string('status_keluarga');
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
