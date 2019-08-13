<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\School;
use App\Repositories\SchoolRepository;

trait MakeSchoolTrait
{
    /**
     * Create fake instance of School and save it in database
     *
     * @param array $schoolFields
     * @return School
     */
    public function makeSchool($schoolFields = [])
    {
        /** @var SchoolRepository $schoolRepo */
        $schoolRepo = \App::make(SchoolRepository::class);
        $theme = $this->fakeSchoolData($schoolFields);
        return $schoolRepo->create($theme);
    }

    /**
     * Get fake instance of School
     *
     * @param array $schoolFields
     * @return School
     */
    public function fakeSchool($schoolFields = [])
    {
        return new School($this->fakeSchoolData($schoolFields));
    }

    /**
     * Get fake data of School
     *
     * @param array $schoolFields
     * @return array
     */
    public function fakeSchoolData($schoolFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama_sekolah' => $fake->word,
            'jenjang' => $fake->word,
            'ikhwan' => $fake->word,
            'akhowat' => $fake->word,
            'boarding' => $fake->word,
            'full_day' => $fake->word,
            'biaya_pendaftaran' => $fake->word,
            'biaya_spp' => $fake->word,
            'yayasan' => $fake->word,
            'address' => $fake->text,
            'lat' => $fake->word,
            'lng' => $fake->word,
            'map' => $fake->word,
            'email' => $fake->word,
            'website' => $fake->word,
            'phone1' => $fake->word,
            'phone2' => $fake->word,
            'logo' => $fake->text,
            'photo1' => $fake->text,
            'photo2' => $fake->text,
            'photo3' => $fake->text,
            'photo4' => $fake->text,
            'video_profil' => $fake->text,
            'short_description' => $fake->text,
            'description' => $fake->text,
            'status' => $fake->word,
            'created_by' => $fake->word,
            'updated_by' => $fake->word,
            'deleted_by' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $schoolFields);
    }
}
