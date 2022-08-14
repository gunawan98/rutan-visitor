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
            $table->id('id_warga_rutan');

						$table->foreignId('id_jenis_warga_rutan');
            $table->foreign('id_jenis_warga_rutan')->references('id_jenis_warga_rutan')->on('jenis_warga_rutan')->onDelete('cascade');

						$table->string('nik', 16)->unique();
						$table->string('nama_warga_rutan', 45);
						$table->text('alamat');
						$table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
						$table->string('no_telepon', 13);
						$table->text('kasus');
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
