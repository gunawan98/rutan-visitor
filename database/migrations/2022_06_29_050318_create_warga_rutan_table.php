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

						$table->foreignId('jenis_warga_rutan_id')->nullable();
            $table->foreign('jenis_warga_rutan_id')->references('id')->on('jenis_warga_rutan')->onDelete('cascade');

						$table->string('nik')->unique();
						$table->string('nama');
						$table->text('alamat');
						$table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
						$table->string('no_telepon');
						$table->string('kasus');
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
        Schema::dropIfExists('warga_rutan');
    }
};
