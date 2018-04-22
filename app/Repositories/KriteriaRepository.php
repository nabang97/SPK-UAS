<?php

namespace App\Repositories;

use App\Models\Kriteria;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KriteriaRepository
 * @package App\Repositories
 * @version April 20, 2018, 6:43 pm UTC
 *
 * @method Kriteria findWithoutFail($id, $columns = ['*'])
 * @method Kriteria find($id, $columns = ['*'])
 * @method Kriteria first($columns = ['*'])
*/
class KriteriaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_kriteria',
        'rata_kriteria'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Kriteria::class;
    }
}
