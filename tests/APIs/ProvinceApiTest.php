<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeProvinceTrait;
use Tests\ApiTestTrait;

class ProvinceApiTest extends TestCase
{
    use MakeProvinceTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_province()
    {
        $province = $this->fakeProvinceData();
        $this->response = $this->json('POST', '/api/provinces', $province);

        $this->assertApiResponse($province);
    }

    /**
     * @test
     */
    public function test_read_province()
    {
        $province = $this->makeProvince();
        $this->response = $this->json('GET', '/api/provinces/'.$province->id);

        $this->assertApiResponse($province->toArray());
    }

    /**
     * @test
     */
    public function test_update_province()
    {
        $province = $this->makeProvince();
        $editedProvince = $this->fakeProvinceData();

        $this->response = $this->json('PUT', '/api/provinces/'.$province->id, $editedProvince);

        $this->assertApiResponse($editedProvince);
    }

    /**
     * @test
     */
    public function test_delete_province()
    {
        $province = $this->makeProvince();
        $this->response = $this->json('DELETE', '/api/provinces/'.$province->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/provinces/'.$province->id);

        $this->response->assertStatus(404);
    }
}
