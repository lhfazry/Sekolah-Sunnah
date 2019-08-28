<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Level
 * @package App\Models
 * @version August 9, 2019, 2:08 pm UTC
 *
 * @property string name
 */
class Subscriber extends Model
{
    use SoftDeletes;

    public $table = 'subscribers';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
}
