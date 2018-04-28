<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePenggarapsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penggaraps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nip')->unique();
            $table->string('nama', 50);
            $table->string('ktp', 25)->unique();
            $table->string('ktp_file')->nullable();
            $table->string('kk', 25)->unique();
            $table->string('kk_file')->nullable();
            $table->string('jenis_kelamin', 10);
            $table->string('status_pernikahan', 25);
            $table->string('telpon', 30);
            $table->string('email', 150)->nullable();
            $table->string('photo')->nullable();
            $table->string('status');
            $table->text('alamat');
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
        Schema::drop('penggaraps');
    }
}
