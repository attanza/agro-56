<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLahanGarapansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lahan_garapans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('penggarap_id')->unsigned();
            $table->string('nama', 50)->unique();
            $table->text('alamat');
            $table->integer('luas');
            $table->string('satuan', 20);
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::drop('lahan_garapans');
    }
}
