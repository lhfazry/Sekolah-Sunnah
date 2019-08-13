<?php namespace Tests\Repositories;

use App\Models\Facility;
use App\Repositories\FacilityRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeFacilityTrait;
use Tests\ApiTestTrait;

class FacilityRepositoryTest extends TestCase
{
    use MakeFacilityTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var FacilityRepository
     */
    protected $facilityRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->facilityRepo = \App::make(FacilityRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_facility()
    {
        $facility = $this->fakeFacilityData();
        $createdFacility = $this->facilityRepo->create($facility);
        $createdFacility = $createdFacility->toArray();
        $this->assertArrayHasKey('id', $createdFacility);
        $this->assertNotNull($createdFacility['id'], 'Created Facility must have id specified');
        $this->assertNotNull(Facility::find($createdFacility['id']), 'Facility with given id must be in DB');
        $this->assertModelData($facility, $createdFacility);
    }

    /**
     * @test read
     */
    public function test_read_facility()
    {
        $facility = $this->makeFacility();
        $dbFacility = $this->facilityRepo->find($facility->id);
        $dbFacility = $dbFacility->toArray();
        $this->assertModelData($facility->toArray(), $dbFacility);
    }

    /**
     * @test update
     */
    public function test_update_facility()
    {
        $facility = $this->makeFacility();
        $fakeFacility = $this->fakeFacilityData();
        $updatedFacility = $this->facilityRepo->update($fakeFacility, $facility->id);
        $this->assertModelData($fakeFacility, $updatedFacility->toArray());
        $dbFacility = $this->facilityRepo->find($facility->id);
        $this->assertModelData($fakeFacility, $dbFacility->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_facility()
    {
        $facility = $this->makeFacility();
        $resp = $this->facilityRepo->delete($facility->id);
        $this->assertTrue($resp);
        $this->assertNull(Facility::find($facility->id), 'Facility should not exist in DB');
    }
}
