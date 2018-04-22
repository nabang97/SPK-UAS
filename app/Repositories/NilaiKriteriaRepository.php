<?php

namespace App\Repositories;

use App\Models\NilaiKriteria;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NilaiKriteriaRepository
 * @package App\Repositories
 * @version April 20, 2018, 6:54 pm UTC
 *
 * @method NilaiKriteria findWithoutFail($id, $columns = ['*'])
 * @method NilaiKriteria find($id, $columns = ['*'])
 * @method NilaiKriteria first($columns = ['*'])
*/
class NilaiKriteriaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kriteria_1_id',
        'kriteria_2_id',
        'bobot_kriteria'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return NilaiKriteria::class;
    }
}
