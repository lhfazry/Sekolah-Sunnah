<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SchoolFacility
 * @package App\Models
 * @version August 9, 2019, 2:05 pm UTC
 *
 * @property \App\Models\School school
 * @property \App\Models\Facility facility
 * @property integer school_id
 * @property integer facility_id
 */
class SchoolFacility extends Model
{
    use SoftDeletes;
    use \Wildside\Userstamps\Userstamps;

    public $table = 'school_facilities';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'school_id',
        'facility_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'school_id' => 'integer',
        'facility_id' => 'integer',
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
    public function school()
    {
        return $this->belongsTo(\App\Models\School::class, 'school_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function facility()
    {
        return $this->belongsTo(\App\Models\Facility::class, 'facility_id', 'id');
    }
}
