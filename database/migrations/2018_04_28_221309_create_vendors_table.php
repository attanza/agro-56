<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVendorsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 50)->unique();
            $table->text('alamat')->nullable();
            $table->string('telpon', 30);
            $table->string('npwp', 30);
            $table->string('npwp_file')->nullable();            
            $table->string('siup', 30);
            $table->string('siup_file')->nullable();            
            $table->string('tdp', 30);
            $table->string('tdp_file')->nullable();            
            $table->integer('jenis_saprotan');
            $table->integer('harga');
            $table->string('nama_penganggung_jawab', 50);
            $table->string('posisi_penanggung_jawab')->nullable();
            $table->text('alamat_penanggung_jawab')->nullable();
            $table->string('no_telpon_penanggung_jawab', 30);
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
        Schema::drop('vendors');
    }
}
