<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Facility
 * @package App\Models
 * @version August 9, 2019, 2:05 pm UTC
 *
 * @property string name
 * @property string description
 */
class Facility extends Model
{
    use SoftDeletes;
    use \Wildside\Userstamps\Userstamps;

    public $table = 'facilities';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description',
        'icon'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'deleted_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
