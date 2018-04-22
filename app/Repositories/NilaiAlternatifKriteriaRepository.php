<?php

namespace App\Repositories;

use App\Models\NilaiAlternatifKriteria;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NilaiAlternatifKriteriaRepository
 * @package App\Repositories
 * @version April 20, 2018, 10:12 pm UTC
 *
 * @method NilaiAlternatifKriteria findWithoutFail($id, $columns = ['*'])
 * @method NilaiAlternatifKriteria find($id, $columns = ['*'])
 * @method NilaiAlternatifKriteria first($columns = ['*'])
*/
class NilaiAlternatifKriteriaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'alternatif_1_id',
        'alternatif_2_id',
        'kriteria_id',
        'bobot_alternatif',
        'norm_alernatif',
        'rata_alternatif_kriteria'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return NilaiAlternatifKriteria::class;
    }
}
