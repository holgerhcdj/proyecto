<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FacturaDetalles
 * @package App\Models
 * @version May 26, 2021, 1:10 pm UTC
 *
 * @property \App\Models\Factura $fac
 * @property integer $fac_id
 * @property string $fade_detalle_trabajo
 * @property string $fade_valor_servicio
 * @property string $fade_descuento
 * @property string $fade_valor_total
 */
class FacturaDetalles extends Model
{
    public $table = 'facturas_detalles';
    protected $primaryKey='fade_id';
    public $timestamps=false;
    

    public $fillable = [
        'fac_id',
        'pla_id',
        'fade_cant',
        'fade_vu'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fade_id' => 'integer',
        'fac_id' => 'integer',
        'pla_id' => 'integer',
        'fade_cant' => 'numeric',
        'fade_vu' => 'numeric'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fac_id' => 'integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function fac()
    {
        return $this->belongsTo(\App\Models\Factura::class, 'fac_id');
    }
}
