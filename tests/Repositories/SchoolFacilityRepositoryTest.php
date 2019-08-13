<?php namespace Tests\Repositories;

use App\Models\SchoolFacility;
use App\Repositories\SchoolFacilityRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeSchoolFacilityTrait;
use Tests\ApiTestTrait;

class SchoolFacilityRepositoryTest extends TestCase
{
    use MakeSchoolFacilityTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SchoolFacilityRepository
     */
    protected $schoolFacilityRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->schoolFacilityRepo = \App::make(SchoolFacilityRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_school_facility()
    {
        $schoolFacility = $this->fakeSchoolFacilityData();
        $createdSchoolFacility = $this->schoolFacilityRepo->create($schoolFacility);
        $createdSchoolFacility = $createdSchoolFacility->toArray();
        $this->assertArrayHasKey('id', $createdSchoolFacility);
        $this->assertNotNull($createdSchoolFacility['id'], 'Created SchoolFacility must have id specified');
        $this->assertNotNull(SchoolFacility::find($createdSchoolFacility['id']), 'SchoolFacility with given id must be in DB');
        $this->assertModelData($schoolFacility, $createdSchoolFacility);
    }

    /**
     * @test read
     */
    public function test_read_school_facility()
    {
        $schoolFacility = $this->makeSchoolFacility();
        $dbSchoolFacility = $this->schoolFacilityRepo->find($schoolFacility->id);
        $dbSchoolFacility = $dbSchoolFacility->toArray();
        $this->assertModelData($schoolFacility->toArray(), $dbSchoolFacility);
    }

    /**
     * @test update
     */
    public function test_update_school_facility()
    {
        $schoolFacility = $this->makeSchoolFacility();
        $fakeSchoolFacility = $this->fakeSchoolFacilityData();
        $updatedSchoolFacility = $this->schoolFacilityRepo->update($fakeSchoolFacility, $schoolFacility->id);
        $this->assertModelData($fakeSchoolFacility, $updatedSchoolFacility->toArray());
        $dbSchoolFacility = $this->schoolFacilityRepo->find($schoolFacility->id);
        $this->assertModelData($fakeSchoolFacility, $dbSchoolFacility->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_school_facility()
    {
        $schoolFacility = $this->makeSchoolFacility();
        $resp = $this->schoolFacilityRepo->delete($schoolFacility->id);
        $this->assertTrue($resp);
        $this->assertNull(SchoolFacility::find($schoolFacility->id), 'SchoolFacility should not exist in DB');
    }
}
