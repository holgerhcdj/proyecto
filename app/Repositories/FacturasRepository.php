<?php

namespace App\Repositories;

use App\Models\Facturas;
use App\Repositories\BaseRepository;

/**
 * Class FacturasRepository
 * @package App\Repositories
 * @version May 26, 2021, 1:09 pm UTC
*/

class FacturasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'per_id',
        'pst_id',
        'fac_numero_facturas',
        'fac_fecha',
        'fac_iva',
        'fac_descuento'        
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
        return Facturas::class;
    }
}
