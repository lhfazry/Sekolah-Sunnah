<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Support\Facades\Storage;
use Wildside\Userstamps\Userstamps;

/**
 * Class School
 * @package App\Models
 * @version August 7, 2019, 9:42 am UTC
 *
 * @property string nama_sekolah
 * @property string jenjang
 * @property boolean ikhwan
 * @property boolean akhowat
 * @property boolean boarding
 * @property boolean full_day
 * @property integer biaya_pendaftaran
 * @property integer biaya_spp
 * @property string yayasan
 * @property string address
 * @property float lat
 * @property float lng
 * @property string map
 * @property string email
 * @property string website
 * @property string phone1
 * @property string phone2
 * @property string logo
 * @property string photo1
 * @property string photo2
 * @property string photo3
 * @property string photo4
 * @property string video_profil
 * @property string short_description
 * @property string description
 * @property string status
 */
class School extends Model implements HasMedia
{
    use SoftDeletes;
    use \Wildside\Userstamps\Userstamps;
    use HasMediaTrait;
    use Userstamps;

    public $table = 'schools';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_sekolah',
        'level_id',
        'city_id',
        'ikhwan',
        'akhowat',
        'boarding',
        'full_day',
        'biaya_pendaftaran',
        'biaya_spp',
        'yayasan',
        'address',
        'lat',
        'lng',
        'map',
        'email',
        'website',
        'phone1',
        'phone2',
        'logo',
        'photo1',
        'photo2',
        'photo3',
        'photo4',
        'video_profil',
        'brochure',
        'short_description',
        'description',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_sekolah' => 'string',
        'jenjang' => 'string',
        'ikhwan' => 'boolean',
        'akhowat' => 'boolean',
        'boarding' => 'boolean',
        'full_day' => 'boolean',
        'biaya_pendaftaran' => 'integer',
        'biaya_spp' => 'integer',
        'yayasan' => 'string',
        'address' => 'string',
        'lat' => 'float',
        'lng' => 'float',
        'map' => 'string',
        'email' => 'string',
        'website' => 'string',
        'phone1' => 'string',
        'phone2' => 'string',
        'logo' => 'string',
        'photo1' => 'string',
        'photo2' => 'string',
        'photo3' => 'string',
        'photo4' => 'string',
        'video_profil' => 'string',
        'short_description' => 'string',
        'description' => 'string',
        'status' => 'string',
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
    public function level()
    {
        return $this->belongsTo(\App\Models\Level::class, 'level_id', 'id');
    }


    public function city()
    {
        return $this->belongsTo(\App\Models\City::class, 'city_id', 'id');
    }

    public function facilities()
    {
        return $this->hasMany(\App\Models\SchoolFacility::class, 'school_id', 'id');
    }

    public function hasFacility($facilityId) {
        return \App\Models\SchoolFacility::where('school_id', $this->id)->where('facility_id', $facilityId)->count()>0?true:false;
    }

    public function getEmbeddedVideoProfileUrl() {
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

        if (preg_match($longUrlRegex, $this->video_profil, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $this->video_profil, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        return 'https://www.youtube.com/embed/' . $youtube_id ;
    }

    public function getLogoUrl() {
        if(!empty($this->logo)) {
            return Storage::disk('s3')->url($this->logo);
        }
        else {
            return "";
        }
    }

    public function getBrochureUrl() {
        if(!empty($this->brochure)) {
            return Storage::disk('s3')->url($this->brochure);
        }
        else {
            return "";
        }
    }

    public function getPhoto1Url() {
        if(!empty($this->photo1)) {
            return Storage::disk('s3')->url($this->photo1);
        }
        else {
            return "";
        }
    }

    public function getPhoto2Url() {
        if(!empty($this->photo2)) {
            return Storage::disk('s3')->url($this->photo2);
        }
        else {
            return "";
        }
    }

    public function getPhoto3Url() {
        if(!empty($this->photo3)) {
            return Storage::disk('s3')->url($this->photo3);
        }
        else {
            return "";
        }
    }

    public function getPhoto4Url() {
        if(!empty($this->photo4)) {
            return Storage::disk('s3')->url($this->photo4);
        }
        else {
            return "";
        }
    }

    public function formattedBiayaPendaftaran() {
        return \App\Helpers\CurrencyHelper::formatCurrency($this->biaya_pendaftaran);
    }

    public function formattedBiayaSPP() {
        return \App\Helpers\CurrencyHelper::formatCurrency($this->biaya_spp);
    }

    public function isVerified() {
        return !empty($this->verified_at);
    }

    public function isPublished() {
        return $this->status == 'Published';
    }

    public function city_province() {
        return !empty($this->city)?$this->city->name.','.$this->city->province->name:'';
    }
}
