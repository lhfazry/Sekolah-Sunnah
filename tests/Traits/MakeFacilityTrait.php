<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\Facility;
use App\Repositories\FacilityRepository;

trait MakeFacilityTrait
{
    /**
     * Create fake instance of Facility and save it in database
     *
     * @param array $facilityFields
     * @return Facility
     */
    public function makeFacility($facilityFields = [])
    {
        /** @var FacilityRepository $facilityRepo */
        $facilityRepo = \App::make(FacilityRepository::class);
        $theme = $this->fakeFacilityData($facilityFields);
        return $facilityRepo->create($theme);
    }

    /**
     * Get fake instance of Facility
     *
     * @param array $facilityFields
     * @return Facility
     */
    public function fakeFacility($facilityFields = [])
    {
        return new Facility($this->fakeFacilityData($facilityFields));
    }

    /**
     * Get fake data of Facility
     *
     * @param array $facilityFields
     * @return array
     */
    public function fakeFacilityData($facilityFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'description' => $fake->text,
            'created_by' => $fake->word,
            'updated_by' => $fake->word,
            'deleted_by' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $facilityFields);
    }
}
