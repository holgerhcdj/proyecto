<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Facturas
 * @package App\Models
 * @version May 26, 2021, 1:09 pm UTC
 *
 * @property \App\Models\Persona $per
 * @property \App\Models\Florerium $flo
 * @property \App\Models\Pedido $ped
 * @property \Illuminate\Database\Eloquent\Collection $facturasDetalles
 * @property integer $per_id
 * @property integer $flo_id
 * @property integer $ped_id
 * @property string $fac_numero_facturas
 * @property string $fac_fecha
 */
class Facturas extends Model
{
    public $table = 'facturas';
    protected $primaryKey='fac_id';
    public $timestamps=false;
    


    public $fillable = [
        'per_id',
        'pst_id',
        'fac_numero_facturas',
        'fac_fecha',
        'fac_iva',
        'fac_descuento'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fac_id' => 'integer',
        'per_id' => 'integer',
        'pst_id' => 'integer',
        'fac_numero_facturas' => 'integer',
        'fac_fecha' => 'date',
        'fac_iva' => 'numeric',
        'fac_descuento' => 'numeric'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'per_id' => 'required|integer',
        'pst_id' => 'required|integer',
        'fac_numero_facturas' => 'numeric|max:20',
        'fac_fecha' => 'date'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function per()
    {
        return $this->belongsTo(\App\Models\Persona::class, 'per_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ped()
    {
        return $this->belongsTo(\App\Models\Pasteleria::class, 'pst_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function facturasDetalles()
    {
        return $this->hasMany(\App\Models\FacturasDetalle::class, 'fac_id');
    }
}
