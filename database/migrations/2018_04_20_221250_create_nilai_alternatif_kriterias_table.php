<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNilaiAlternatifKriteriasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_alternatif_kriterias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('alternatif_1_id')->unsigned();
            $table->integer('alternatif_2_id')->unsigned();
            $table->integer('kriteria_id')->unsigned();
            $table->double('bobot_alternatif')->nullable();
            $table->double('norm_alernatif')->nullable();
            $table->double('rata_alternatif_kriteria')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('alternatif_1_id')->references('id')->on('alternatifs');
            $table->foreign('alternatif_2_id')->references('id')->on('alternatifs');
            $table->foreign('kriteria_id')->references('id')->on('kriterias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nilai_alternatif_kriterias');
    }
}
