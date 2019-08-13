<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\City;
use App\Repositories\CityRepository;

trait MakeCityTrait
{
    /**
     * Create fake instance of City and save it in database
     *
     * @param array $cityFields
     * @return City
     */
    public function makeCity($cityFields = [])
    {
        /** @var CityRepository $cityRepo */
        $cityRepo = \App::make(CityRepository::class);
        $theme = $this->fakeCityData($cityFields);
        return $cityRepo->create($theme);
    }

    /**
     * Get fake instance of City
     *
     * @param array $cityFields
     * @return City
     */
    public function fakeCity($cityFields = [])
    {
        return new City($this->fakeCityData($cityFields));
    }

    /**
     * Get fake data of City
     *
     * @param array $cityFields
     * @return array
     */
    public function fakeCityData($cityFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'province_id' => $fake->randomDigitNotNull,
            'name' => $fake->word,
            'created_by' => $fake->word,
            'updated_by' => $fake->word,
            'deleted_by' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $cityFields);
    }
}
