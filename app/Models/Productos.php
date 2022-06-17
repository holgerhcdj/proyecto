<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Productos
 * @package App\Models
 * @version June 17, 2022, 4:56 pm UTC
 *
 * @property \App\Models\Tipo $tip
 * @property \Illuminate\Database\Eloquent\Collection $facturas
 * @property integer $tip_id
 * @property string $pas_nombre
 * @property string $pas_descripcion
 * @property integer $pas_precio
 * @property integer $pas_estado
 */
class Productos extends Model
{
    public $table = 'productos';
    protected $primaryKey='pas_id';
    public $timestamps=false;    



    public $fillable = [
        'tip_id',
        'pas_nombre',
        'pas_descripcion',
        'pas_precio',
        'pas_estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'pas_id' => 'integer',
        'tip_id' => 'integer',
        'pas_nombre' => 'string',
        'pas_descripcion' => 'string',
        'pas_precio' => 'integer',
        'pas_estado' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tip_id' => 'required|integer',
        'pas_nombre' => 'required|string|max:50',
        'pas_descripcion' => 'required|string|max:250',
        'pas_precio' => 'required|integer',
        'pas_estado' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tip()
    {
        return $this->belongsTo(\App\Models\Tipo::class, 'tip_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function facturas()
    {
        return $this->belongsToMany(\App\Models\Factura::class, 'facturas_detalles');
    }
}
