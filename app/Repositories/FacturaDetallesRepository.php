<?php

namespace App\Repositories;

use App\Models\FacturaDetalles;
use App\Repositories\BaseRepository;

/**
 * Class FacturaDetallesRepository
 * @package App\Repositories
 * @version May 26, 2021, 1:10 pm UTC
*/

class FacturaDetallesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'per_id',
        'flo_id',
        'ped_id',
        'fac_numero_facturas',
        'fac_fecha'
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
        return FacturaDetalles::class;
    }
}
