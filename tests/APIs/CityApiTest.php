<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeCityTrait;
use Tests\ApiTestTrait;

class CityApiTest extends TestCase
{
    use MakeCityTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_city()
    {
        $city = $this->fakeCityData();
        $this->response = $this->json('POST', '/api/cities', $city);

        $this->assertApiResponse($city);
    }

    /**
     * @test
     */
    public function test_read_city()
    {
        $city = $this->makeCity();
        $this->response = $this->json('GET', '/api/cities/'.$city->id);

        $this->assertApiResponse($city->toArray());
    }

    /**
     * @test
     */
    public function test_update_city()
    {
        $city = $this->makeCity();
        $editedCity = $this->fakeCityData();

        $this->response = $this->json('PUT', '/api/cities/'.$city->id, $editedCity);

        $this->assertApiResponse($editedCity);
    }

    /**
     * @test
     */
    public function test_delete_city()
    {
        $city = $this->makeCity();
        $this->response = $this->json('DELETE', '/api/cities/'.$city->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/cities/'.$city->id);

        $this->response->assertStatus(404);
    }
}
