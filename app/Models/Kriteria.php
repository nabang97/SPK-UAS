<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Kriteria
 * @package App\Models
 * @version April 20, 2018, 6:43 pm UTC
 *
 * @property string nama_kriteria
 * @property double rata_kriteria
 */
class Kriteria extends Model
{
    use SoftDeletes;

    public $table = 'kriterias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_kriteria',
        'rata_kriteria'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_kriteria' => 'string',
        'rata_kriteria' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_kriteria' => 'required'
    ];

    public function nilaiKriteria()
    {
        return $this->hasMany(NilaiKriteria::class);
    }
    
}
