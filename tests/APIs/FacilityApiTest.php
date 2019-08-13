<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeFacilityTrait;
use Tests\ApiTestTrait;

class FacilityApiTest extends TestCase
{
    use MakeFacilityTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_facility()
    {
        $facility = $this->fakeFacilityData();
        $this->response = $this->json('POST', '/api/facilities', $facility);

        $this->assertApiResponse($facility);
    }

    /**
     * @test
     */
    public function test_read_facility()
    {
        $facility = $this->makeFacility();
        $this->response = $this->json('GET', '/api/facilities/'.$facility->id);

        $this->assertApiResponse($facility->toArray());
    }

    /**
     * @test
     */
    public function test_update_facility()
    {
        $facility = $this->makeFacility();
        $editedFacility = $this->fakeFacilityData();

        $this->response = $this->json('PUT', '/api/facilities/'.$facility->id, $editedFacility);

        $this->assertApiResponse($editedFacility);
    }

    /**
     * @test
     */
    public function test_delete_facility()
    {
        $facility = $this->makeFacility();
        $this->response = $this->json('DELETE', '/api/facilities/'.$facility->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/facilities/'.$facility->id);

        $this->response->assertStatus(404);
    }
}
