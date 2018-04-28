<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePasangansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasangans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('penggarap_id')->unsigned();
            $table->string('nama', 50);
            $table->string('ktp', 25);
            $table->string('ktp_file')->nullable();
            $table->string('jenis_kelamin', 15);
            $table->string('telpon', 30)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('photo')->nullable();
            $table->string('no_surat_nikah', 30);
            $table->string('surat_nikah_file')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pasangans');
    }
}
