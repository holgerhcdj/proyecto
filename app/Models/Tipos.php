<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tipos
 * @package App\Models
 * @version June 19, 2021, 8:19 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $pasteles
 * @property string $tip_descripcion
 * @property integer $tip_estado
 * @property string $tip_fecha
 */
class Tipos extends Model
{
    // use SoftDeletes;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';
    // protected $dates = ['deleted_at'];

    public $table = 'tipos';
    protected $primaryKey='tip_id';
    public $timestamps=false;



    public $fillable = [
        'tip_descripcion',
        'tip_estado',
        'tip_fecha'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tip_id' => 'integer',
        'tip_descripcion' => 'string',
        'tip_estado' => 'integer',
        'tip_fecha' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tip_descripcion' => 'required|string|max:50',
        'tip_estado' => 'required|integer',
        'tip_fecha' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pasteles()
    {
        return $this->hasMany(\App\Models\Pastele::class, 'tip_id');
    }
}
