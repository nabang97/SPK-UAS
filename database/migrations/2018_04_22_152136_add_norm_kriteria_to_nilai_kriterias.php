<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNormKriteriaToNilaiKriterias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nilai_kriterias', function($table) {
            $table->double('norm_kriteria')->nullable()->after('bobot_kriteria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nilai_kriterias', function($table) {
            $table->dropColumn('norm_kriteria');
        });
    }
}
