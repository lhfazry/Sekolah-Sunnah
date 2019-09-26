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
 * @property string slug_sekolah
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
        'slug_sekolah',
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
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'contact_person',
        'hp',
        'logo',
        'photo1',
        'photo2',
        'photo3',
        'photo4',
        'photo5',
        'photo6',
        'photo7',
        'photo8',
        'video_profil',
        'brochure',
        'brochure1',
        'brochure2',
        'brochure3',
        'brochure4',
        'brochure5',
        'brochure6',
        'brochure7',
        'brochure8',
        'short_description',
        'description',
        'editor_choice',
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
        'slug_sekolah' => 'string',
        'jenjang' => 'string',
        'ikhwan' => 'boolean',
        'akhowat' => 'boolean',
        'boarding' => 'boolean',
        'full_day' => 'boolean',
        'biaya_pendaftaran' => 'string',
        'biaya_spp' => 'string',
        'yayasan' => 'string',
        'address' => 'string',
        'lat' => 'float',
        'lng' => 'float',
        'map' => 'string',
        'email' => 'string',
        'website' => 'string',
        'phone1' => 'string',
        'phone2' => 'string',
        'facebook' => 'string',
        'instagram' => 'string',
        'twitter' => 'string',
        'youtube' => 'string',
        'contact_person' => 'string',
        'hp' => 'string',
        'logo' => 'string',
        'photo1' => 'string',
        'photo2' => 'string',
        'photo3' => 'string',
        'photo4' => 'string',
        'photo5' => 'string',
        'photo6' => 'string',
        'photo7' => 'string',
        'photo8' => 'string',
        'video_profil' => 'string',
        'brochure1' => 'string',
        'brochure2' => 'string',
        'brochure3' => 'string',
        'brochure4' => 'string',
        'brochure5' => 'string',
        'brochure6' => 'string',
        'brochure7' => 'string',
        'brochure8' => 'string',
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
        'nama_sekolah' => 'required',
        'level_id' => 'required',
        'city_id' => 'required',
        'biaya_pendaftaran' => 'required|min:50000',
        'biaya_spp' => 'required',
        'address' => 'required',
        'phone1' => 'required',
        'contact_person' => 'required',
        'hp' => 'required'
    ];

    public static $messages = [
        'nama_sekolah.required' => 'Nama Sekolah tidak boleh kosong',
        'level_id.required' => 'Jenjang tidak boleh kosong',
        'city_id.required' => 'Kota tidak boleh kosong',
        'biaya_pendaftaran.required' => 'Uang masuk tidak boleh kosong',
        'biaya_pendaftaran.min' => 'Uang masuk Minimal Rp50.000,-',
        'biaya_spp.required' => 'Biaya bulanan tidak boleh kosong',
        'address.required' => 'Alamat tidak boleh kosong',
        'phone1.required' => 'Telpon 1 tidak boleh kosong',
        'contact_person.required' => 'Contact Person tidak boleh kosong',
        'hp.required' => 'Nomor HP tidak boleh kosong',
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
        $youtube_id = '';

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

    public function getPhotoUrl($number) {
        if(!empty($this->{"photo".$number})) {
            return Storage::disk('s3')->url($this->{"photo".$number});
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
        if (strpos($this->biaya_pendaftaran, ',') !== false) {
            return $this->biaya_pendaftaran;
        }
        else {
            return \App\Helpers\CurrencyHelper::formatCurrency($this->biaya_pendaftaran);
        }
        //return \App\Helpers\CurrencyHelper::formatCurrency($this->biaya_pendaftaran);
        //return $this->biaya_pendaftaran;
    }

    public function formattedBiayaSPP() {
        if (strpos($this->biaya_spp, ',') !== false) {
            return $this->biaya_spp;
        }
        else {
            return \App\Helpers\CurrencyHelper::formatCurrency($this->biaya_spp);
        }
        // return \App\Helpers\CurrencyHelper::formatCurrency($this->biaya_spp);
        //return $this->biaya_spp;
    }

    public function displaySPP($withMonth = true) {
        if($withMonth) {
            return "Rp. " .$this->formattedBiayaSPP()."/Bulan";
        }
        else {
            return "Rp. " .$this->formattedBiayaSPP();
        }
    }

    public function displayBiayaPendaftaran() {
        return "Rp. " .$this->formattedBiayaPendaftaran();
    }

    public function isVerified() {
        return !empty($this->verified_at);
    }

    public function isPublished() {
        return $this->status == 'Published';
    }

    public function city_province() {
        return !empty($this->city)?$this->city->name.', '.$this->city->province->name:'';
    }

    public function exceprt() {
        //return \App\Helpers\StringHelper::exceprt($this->short_description);
        return \Illuminate\Support\Str::words(strip_tags($this->description), 150, '...');
    }

    public function displayFacilities() {
        $html = "";

        foreach($this->facilities as $fct) {
            $facility = $fct->facility;

            if(empty($facility)) {
                continue;
            }

            $html .= "<i title=\"".$facility->name."\" style=\"font-size:24px;\" class=\"text-success fas ".$facility->icon."\"></i>&nbsp;";
        }

        return $html;
    }

    public function displayStatus() {
        if(!empty($this->verified_at)){
            return "<span class=\"badge badge-success\">Verified</span>";
        }
        else {
            return "<span class=\"badge badge-danger\">Unverified</span>";
        }
    }

    public function getTags() {
        $tags = "";

        foreach($this->facilities as $fct) {
            $facility = $fct->facility;

            if(empty($facility)) {
                continue;
            }

            if($facility->name == "Ikhwan") {
                $tags .= "<a href=\"#\" class=\"tag category\">Ikhwan</a>&nbsp;";
            }

            if($facility->name == "Akhwat") {
                $tags .= "<a href=\"#\" class=\"tag category\">Akhwat</a>&nbsp;";
            }
        }

        return $tags;
    }

    public function getOtherFacilities() {
        $tags = "";

        foreach($this->facilities as $fct) {
            $facility = $fct->facility;

            if(empty($facility)) {
                continue;
            }

            if(in_array($facility->name, ['Ikhwan', 'Akhwat'])) {
                continue;
            }

            $tags .= "<figure><i class=\"fas ".$facility->icon."\"></i>".$facility->name."</figure>";
        }

        return $tags;
    }

    public function getPhotoCoverUrl() {
        if(!empty($this->photo1)) {
            return $this->getPhoto1Url();
        }

        if(!empty($this->photo2)) {
            return $this->getPhoto2Url();
        }

        if(!empty($this->photo3)) {
            return $this->getPhoto3Url();
        }

        if(!empty($this->photo4)) {
            return $this->getPhoto4Url();
        }

        return "http://www.fiwa.sch.id/static_content/img/BasketBall5d454d6ab8989.jpg";
    }

    public function getPhotos() {
        $photos = [];

        for($i=1; $i<=8; $i++) {
            $url = $this->getPhotoUrl($i);

            if(!empty($url)) {
                $photos[] = $url;
            }
        }

        if(sizeof($photos) == 0) {
            $photos[] = $this->getPhotoCoverUrl();
        }

        return $photos;
    }

    public function isMySchool() {
        $userId = auth()->user()->id;
        $creatorId = 0;

        if(!empty($this->creator)) {
            $creatorId = $this->creator->id;
        }

        if($userId == $creatorId) {
            return true;
        }

        return false;
    }

    public function isLocationExists() {
        return !empty($this->lat) && !empty($this->lng);
    }
}
