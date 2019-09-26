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
class Level extends Model
{
    use SoftDeletes;
    use \Wildside\Userstamps\Userstamps;

    public $table = 'levels';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'icon',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'icon' => 'string',
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

    public function displayCountLevel() {
        return School::where(['level_id' => $this->id, 'status' => 'Published'])->count();
    }
}
