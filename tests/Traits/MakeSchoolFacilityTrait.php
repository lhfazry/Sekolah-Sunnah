<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\SchoolFacility;
use App\Repositories\SchoolFacilityRepository;

trait MakeSchoolFacilityTrait
{
    /**
     * Create fake instance of SchoolFacility and save it in database
     *
     * @param array $schoolFacilityFields
     * @return SchoolFacility
     */
    public function makeSchoolFacility($schoolFacilityFields = [])
    {
        /** @var SchoolFacilityRepository $schoolFacilityRepo */
        $schoolFacilityRepo = \App::make(SchoolFacilityRepository::class);
        $theme = $this->fakeSchoolFacilityData($schoolFacilityFields);
        return $schoolFacilityRepo->create($theme);
    }

    /**
     * Get fake instance of SchoolFacility
     *
     * @param array $schoolFacilityFields
     * @return SchoolFacility
     */
    public function fakeSchoolFacility($schoolFacilityFields = [])
    {
        return new SchoolFacility($this->fakeSchoolFacilityData($schoolFacilityFields));
    }

    /**
     * Get fake data of SchoolFacility
     *
     * @param array $schoolFacilityFields
     * @return array
     */
    public function fakeSchoolFacilityData($schoolFacilityFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'school_id' => $fake->randomDigitNotNull,
            'facility_id' => $fake->randomDigitNotNull,
            'created_by' => $fake->word,
            'updated_by' => $fake->word,
            'deleted_by' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $schoolFacilityFields);
    }
}
