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
        Schema::create('warga_rutan', function (Blueprint $table) {
            $table->id();

						$table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

						$table->string('name');
						$table->enum('tipe', ['pidana', 'tahanan']);
						$table->string('kasus');
						$table->string('no_nik')->unique();
						$table->string('hubungan');
						$table->string('file_ktp')->nullable();
						$table->string('file_foto')->nullable();
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
        Schema::dropIfExists('warga_rutan');
    }
};
