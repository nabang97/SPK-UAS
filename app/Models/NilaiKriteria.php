<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class NilaiKriteria
 * @package App\Models
 * @version April 20, 2018, 6:54 pm UTC
 *
 * @property integer kriteria_1_id
 * @property integer kriteria_2_id
 * @property double bobot_kriteria
 */
class NilaiKriteria extends Model
{
    use SoftDeletes;

    public $table = 'nilai_kriterias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'kriteria_1_id',
        'kriteria_2_id',
        'bobot_kriteria'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'kriteria_1_id' => 'integer',
        'kriteria_2_id' => 'integer',
        'bobot_kriteria' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kriteria_1_id' => 'required',
        'kriteria_2_id' => 'required',
        'bobot_kriteria' => 'required'
    ];

    public function kriteria1()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_1_id', 'id');
    }

    public function kriteria2()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_2_id', 'id');
    }

    
}
