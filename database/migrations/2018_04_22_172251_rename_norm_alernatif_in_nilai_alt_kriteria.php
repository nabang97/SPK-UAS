<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameNormAlernatifInNilaiAltKriteria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nilai_alternatif_kriterias', function($table) {
            $table->renameColumn('norm_alernatif', 'norm_alternatif');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nilai_alternatif_kriterias', function($table) {
            $table->renameColumn('norm_alternatif', 'norm_alernatif');
        });
    }
}
