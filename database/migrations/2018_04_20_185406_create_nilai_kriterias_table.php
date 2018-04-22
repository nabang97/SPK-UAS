<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNilaiKriteriasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_kriterias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kriteria_1_id')->unsigned();
            $table->integer('kriteria_2_id')->unsigned();
            $table->double('bobot_kriteria');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('kriteria_1_id')->references('id')->on('kriterias');
            $table->foreign('kriteria_2_id')->references('id')->on('kriterias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nilai_kriterias');
    }
}
