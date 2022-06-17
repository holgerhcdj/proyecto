<?php

namespace App\Repositories;

use App\Models\Tipos;
use App\Repositories\BaseRepository;

/**
 * Class TiposRepository
 * @package App\Repositories
 * @version June 19, 2021, 8:19 pm UTC
*/

class TiposRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tip_descripcion',
        'tip_estado',
        'tip_fecha'
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
        return Tipos::class;
    }
}
