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
        Schema::create('petugas', function (Blueprint $table) {
						$table->id('id_petugas');
						$table->string('nama_petugas', 45);
						$table->text('alamat');
						$table->string('no_telepon', 13)->unique();
						$table->string('username', 45)->unique();
						$table->string('password', 200);
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
        Schema::dropIfExists('petugas');
    }
};
