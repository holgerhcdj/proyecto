<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Almaneces
 * @package App\Models
 * @version June 17, 2022, 4:40 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $personas
 * @property string $pst_razon_social
 * @property string $pst_rep_legal
 * @property string $pst_direccion
 * @property string $pst_telefono
 */
class Almaneces extends Model
{
    public $table = 'almacen';
    protected $primaryKey='pst_id';
    public $timestamps=false;    



    public $fillable = [
        'pst_razon_social',
        'pst_rep_legal',
        'pst_direccion',
        'pst_telefono'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'pst_id' => 'integer',
        'pst_razon_social' => 'string',
        'pst_rep_legal' => 'string',
        'pst_direccion' => 'string',
        'pst_telefono' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'pst_razon_social' => 'required|string|max:100',
        'pst_rep_legal' => 'required|string|max:100',
        'pst_direccion' => 'required|string|max:100',
        'pst_telefono' => 'required|string|max:100'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function personas()
    {
        return $this->belongsToMany(\App\Models\Persona::class, 'facturas');
    }
}
