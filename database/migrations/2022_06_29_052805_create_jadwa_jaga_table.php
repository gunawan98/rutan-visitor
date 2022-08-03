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
        Schema::create('jadwal_jaga', function (Blueprint $table) {
            $table->id();

						$table->foreignId('petugas_id')->nullable();
            $table->foreign('petugas_id')->references('id')->on('petugas')->onDelete('cascade');

						$table->string('hari');
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
        Schema::dropIfExists('jadwal_jaga');
    }
};
