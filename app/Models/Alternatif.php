<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Alternatif
 * @package App\Models
 * @version April 20, 2018, 6:32 pm UTC
 *
 * @property string nama
 * @property double nilai_akhir
 */
class Alternatif extends Model
{
    use SoftDeletes;

    public $table = 'alternatifs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'nilai_akhir'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'nilai_akhir' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required'
    ];

    
}
