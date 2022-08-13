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
        Schema::create('pengunjung', function (Blueprint $table) {
            $table->id('id_pengunjung');
						$table->string('nik', 16)->unique();
            $table->string('nama_pengunjung', 45);
						$table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('no_telepon', 13)->unique();
						$table->text('alamat');
            $table->string('username', 255)->unique();
            $table->string('password', 255);
						$table->enum('status', ['y', 't']);
            $table->rememberToken();
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
        Schema::dropIfExists('pengunjung');
    }
};
