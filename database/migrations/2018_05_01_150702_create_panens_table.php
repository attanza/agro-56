<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePanensTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 50);
            $table->integer('penggarap_id');
            $table->date('tanggal');
            $table->integer('komoditi_id');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->integer('pembayaran')->nullable();
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
        Schema::drop('panens');
    }
}
