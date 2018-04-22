<?php

namespace App\Repositories;

use App\Models\Alternatif;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AlternatifRepository
 * @package App\Repositories
 * @version April 20, 2018, 6:32 pm UTC
 *
 * @method Alternatif findWithoutFail($id, $columns = ['*'])
 * @method Alternatif find($id, $columns = ['*'])
 * @method Alternatif first($columns = ['*'])
*/
class AlternatifRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'nilai_akhir'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Alternatif::class;
    }
}
