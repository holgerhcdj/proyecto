<?php

namespace App\Repositories;

use App\Models\Productos;
use App\Repositories\BaseRepository;

/**
 * Class ProductosRepository
 * @package App\Repositories
 * @version June 17, 2022, 4:56 pm UTC
*/

class ProductosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tip_id',
        'pas_nombre',
        'pas_descripcion',
        'pas_precio',
        'pas_estado'
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
        return Productos::class;
    }
}
