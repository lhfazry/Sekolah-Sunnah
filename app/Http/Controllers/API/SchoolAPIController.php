<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSchoolAPIRequest;
use App\Http\Requests\API\UpdateSchoolAPIRequest;
use App\Models\School;
use App\Repositories\SchoolRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SchoolController
 * @package App\Http\Controllers\API
 */

class SchoolAPIController extends AppBaseController
{
    /** @var  SchoolRepository */
    private $schoolRepository;

    public function __construct(SchoolRepository $schoolRepo)
    {
        $this->schoolRepository = $schoolRepo;
    }

    /**
     * Display a listing of the School.
     * GET|HEAD /schools
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $schools = $this->schoolRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($schools->toArray(), 'Schools retrieved successfully');
    }

    /**
     * Store a newly created School in storage.
     * POST /schools
     *
     * @param CreateSchoolAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSchoolAPIRequest $request)
    {
        $input = $request->all();

        $school = $this->schoolRepository->create($input);

        return $this->sendResponse($school->toArray(), 'School saved successfully');
    }

    /**
     * Display the specified School.
     * GET|HEAD /schools/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var School $school */
        $school = $this->schoolRepository->find($id);

        if (empty($school)) {
            return $this->sendError('School not found');
        }

        return $this->sendResponse($school->toArray(), 'School retrieved successfully');
    }

    /**
     * Update the specified School in storage.
     * PUT/PATCH /schools/{id}
     *
     * @param int $id
     * @param UpdateSchoolAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSchoolAPIRequest $request)
    {
        $input = $request->all();

        /** @var School $school */
        $school = $this->schoolRepository->find($id);

        if (empty($school)) {
            return $this->sendError('School not found');
        }

        $school = $this->schoolRepository->update($input, $id);

        return $this->sendResponse($school->toArray(), 'School updated successfully');
    }

    /**
     * Remove the specified School from storage.
     * DELETE /schools/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var School $school */
        $school = $this->schoolRepository->find($id);

        if (empty($school)) {
            return $this->sendError('School not found');
        }

        $school->delete();

        return $this->sendResponse($id, 'School deleted successfully');
    }
}
