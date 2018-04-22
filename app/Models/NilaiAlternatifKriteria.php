<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class NilaiAlternatifKriteria
 * @package App\Models
 * @version April 20, 2018, 10:12 pm UTC
 *
 * @property integer alternatif_1_id
 * @property integer alternatif_2_id
 * @property integer kriteria_id
 * @property double bobot_alternatif
 * @property double norm_alernatif
 * @property double rata_alternatif_kriteria
 */
class NilaiAlternatifKriteria extends Model
{
    use SoftDeletes;

    public $table = 'nilai_alternatif_kriterias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'alternatif_1_id',
        'alternatif_2_id',
        'kriteria_id',
        'bobot_alternatif',
        'norm_alernatif',
        'rata_alternatif_kriteria'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'alternatif_1_id' => 'integer',
        'alternatif_2_id' => 'integer',
        'kriteria_id' => 'integer',
        'bobot_alternatif' => 'double',
        'norm_alernatif' => 'double',
        'rata_alternatif_kriteria' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id', 'id');
    }

    public function alternatif1()
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_1_id', 'id');
    }

    public function alternatif2()
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_2_id', 'id');
    }
    
}
