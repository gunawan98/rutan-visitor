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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();

						$table->foreignId('officer_id')->nullable();
            $table->foreign('officer_id')->references('id')->on('officers')->onDelete('cascade');

						$table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

						$table->foreignId('criminal_id')->nullable();
            $table->foreign('criminal_id')->references('id')->on('criminals')->onDelete('cascade');

						$table->integer('jmh_pengikut_laki');
						$table->integer('jmh_pengikut_perempuan');
						$table->integer('jmh_pengikut_anak');
						$table->integer('no_antrian');
						$table->string('jam_kunjungan');
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
        Schema::dropIfExists('visitors');
    }
};
