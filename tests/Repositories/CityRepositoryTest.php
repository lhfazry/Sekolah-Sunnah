<?php namespace Tests\Repositories;

use App\Models\City;
use App\Repositories\CityRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeCityTrait;
use Tests\ApiTestTrait;

class CityRepositoryTest extends TestCase
{
    use MakeCityTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CityRepository
     */
    protected $cityRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cityRepo = \App::make(CityRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_city()
    {
        $city = $this->fakeCityData();
        $createdCity = $this->cityRepo->create($city);
        $createdCity = $createdCity->toArray();
        $this->assertArrayHasKey('id', $createdCity);
        $this->assertNotNull($createdCity['id'], 'Created City must have id specified');
        $this->assertNotNull(City::find($createdCity['id']), 'City with given id must be in DB');
        $this->assertModelData($city, $createdCity);
    }

    /**
     * @test read
     */
    public function test_read_city()
    {
        $city = $this->makeCity();
        $dbCity = $this->cityRepo->find($city->id);
        $dbCity = $dbCity->toArray();
        $this->assertModelData($city->toArray(), $dbCity);
    }

    /**
     * @test update
     */
    public function test_update_city()
    {
        $city = $this->makeCity();
        $fakeCity = $this->fakeCityData();
        $updatedCity = $this->cityRepo->update($fakeCity, $city->id);
        $this->assertModelData($fakeCity, $updatedCity->toArray());
        $dbCity = $this->cityRepo->find($city->id);
        $this->assertModelData($fakeCity, $dbCity->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_city()
    {
        $city = $this->makeCity();
        $resp = $this->cityRepo->delete($city->id);
        $this->assertTrue($resp);
        $this->assertNull(City::find($city->id), 'City should not exist in DB');
    }
}
