<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class City
 * @package App\Models
 * @version August 7, 2019, 9:42 am UTC
 *
 * @property \App\Models\Province province
 * @property integer province_id
 * @property string name
 */
class City extends Model
{
    use SoftDeletes;
    use \Wildside\Userstamps\Userstamps;

    public $table = 'cities';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'province_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'province_id' => 'integer',
        'name' => 'string',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function province()
    {
        return $this->belongsTo(\App\Models\Province::class, 'province_id', 'id');
    }
}
