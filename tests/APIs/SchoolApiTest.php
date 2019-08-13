<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeSchoolTrait;
use Tests\ApiTestTrait;

class SchoolApiTest extends TestCase
{
    use MakeSchoolTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_school()
    {
        $school = $this->fakeSchoolData();
        $this->response = $this->json('POST', '/api/schools', $school);

        $this->assertApiResponse($school);
    }

    /**
     * @test
     */
    public function test_read_school()
    {
        $school = $this->makeSchool();
        $this->response = $this->json('GET', '/api/schools/'.$school->id);

        $this->assertApiResponse($school->toArray());
    }

    /**
     * @test
     */
    public function test_update_school()
    {
        $school = $this->makeSchool();
        $editedSchool = $this->fakeSchoolData();

        $this->response = $this->json('PUT', '/api/schools/'.$school->id, $editedSchool);

        $this->assertApiResponse($editedSchool);
    }

    /**
     * @test
     */
    public function test_delete_school()
    {
        $school = $this->makeSchool();
        $this->response = $this->json('DELETE', '/api/schools/'.$school->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/schools/'.$school->id);

        $this->response->assertStatus(404);
    }
}
