<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Role
 * @package App\Models
 * @version January 15, 2019, 8:39 pm UTC
 *
 * @property \App\Models\ModelHasRole modelHasRole
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string name
 * @property string guard_name
 */
class Role extends Model
{
    //use SoftDeletes;
    const ROLE_ADMIN = 'Admin';
    const ROLE_CONTRIBUTOR = 'Contributor';

    public $table = 'roles';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'guard_name',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'guard_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function modelHasRole()
    {
        return $this->hasOne(\App\Models\ModelHasRole::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function permissions() {
        return $this->belongsToMany(\App\Models\Permission::class, 'role_has_permissions');
    }

    public static function isAdmin() {
        return \Auth::user()->hasAnyRole([Role::ROLE_ADMIN]);;
    }

    public static function isContributor() {
        return \Auth::user()->hasAnyRole([Role::ROLE_CONTRIBUTOR]);
    }
}
