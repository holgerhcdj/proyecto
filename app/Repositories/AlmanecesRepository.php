<?php

namespace App\Repositories;

use App\Models\Almaneces;
use App\Repositories\BaseRepository;

/**
 * Class AlmanecesRepository
 * @package App\Repositories
 * @version June 17, 2022, 4:40 pm UTC
*/

class AlmanecesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pst_razon_social',
        'pst_rep_legal',
        'pst_direccion',
        'pst_telefono'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Almaneces::class;
    }
}
