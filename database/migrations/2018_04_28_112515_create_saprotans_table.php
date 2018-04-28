<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSaprotansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saprotans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 50)->unique();
            $table->integer('jenis_id')->unsigned();
            $table->string('merk', 25);
            $table->string('satuan', 15);
            $table->integer('harga_satuan');
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
        Schema::drop('saprotans');
    }
}
