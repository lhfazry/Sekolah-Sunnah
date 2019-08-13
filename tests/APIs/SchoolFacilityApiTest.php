<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeSchoolFacilityTrait;
use Tests\ApiTestTrait;

class SchoolFacilityApiTest extends TestCase
{
    use MakeSchoolFacilityTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_school_facility()
    {
        $schoolFacility = $this->fakeSchoolFacilityData();
        $this->response = $this->json('POST', '/api/schoolFacilities', $schoolFacility);

        $this->assertApiResponse($schoolFacility);
    }

    /**
     * @test
     */
    public function test_read_school_facility()
    {
        $schoolFacility = $this->makeSchoolFacility();
        $this->response = $this->json('GET', '/api/schoolFacilities/'.$schoolFacility->id);

        $this->assertApiResponse($schoolFacility->toArray());
    }

    /**
     * @test
     */
    public function test_update_school_facility()
    {
        $schoolFacility = $this->makeSchoolFacility();
        $editedSchoolFacility = $this->fakeSchoolFacilityData();

        $this->response = $this->json('PUT', '/api/schoolFacilities/'.$schoolFacility->id, $editedSchoolFacility);

        $this->assertApiResponse($editedSchoolFacility);
    }

    /**
     * @test
     */
    public function test_delete_school_facility()
    {
        $schoolFacility = $this->makeSchoolFacility();
        $this->response = $this->json('DELETE', '/api/schoolFacilities/'.$schoolFacility->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/schoolFacilities/'.$schoolFacility->id);

        $this->response->assertStatus(404);
    }
}
