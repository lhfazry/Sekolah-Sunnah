<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSchoolFacilityAPIRequest;
use App\Http\Requests\API\UpdateSchoolFacilityAPIRequest;
use App\Models\SchoolFacility;
use App\Repositories\SchoolFacilityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SchoolFacilityController
 * @package App\Http\Controllers\API
 */

class SchoolFacilityAPIController extends AppBaseController
{
    /** @var  SchoolFacilityRepository */
    private $schoolFacilityRepository;

    public function __construct(SchoolFacilityRepository $schoolFacilityRepo)
    {
        $this->schoolFacilityRepository = $schoolFacilityRepo;
    }

    /**
     * Display a listing of the SchoolFacility.
     * GET|HEAD /schoolFacilities
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $schoolFacilities = $this->schoolFacilityRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($schoolFacilities->toArray(), 'School Facilities retrieved successfully');
    }

    /**
     * Store a newly created SchoolFacility in storage.
     * POST /schoolFacilities
     *
     * @param CreateSchoolFacilityAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSchoolFacilityAPIRequest $request)
    {
        $input = $request->all();

        $schoolFacility = $this->schoolFacilityRepository->create($input);

        return $this->sendResponse($schoolFacility->toArray(), 'School Facility saved successfully');
    }

    /**
     * Display the specified SchoolFacility.
     * GET|HEAD /schoolFacilities/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SchoolFacility $schoolFacility */
        $schoolFacility = $this->schoolFacilityRepository->find($id);

        if (empty($schoolFacility)) {
            return $this->sendError('School Facility not found');
        }

        return $this->sendResponse($schoolFacility->toArray(), 'School Facility retrieved successfully');
    }

    /**
     * Update the specified SchoolFacility in storage.
     * PUT/PATCH /schoolFacilities/{id}
     *
     * @param int $id
     * @param UpdateSchoolFacilityAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSchoolFacilityAPIRequest $request)
    {
        $input = $request->all();

        /** @var SchoolFacility $schoolFacility */
        $schoolFacility = $this->schoolFacilityRepository->find($id);

        if (empty($schoolFacility)) {
            return $this->sendError('School Facility not found');
        }

        $schoolFacility = $this->schoolFacilityRepository->update($input, $id);

        return $this->sendResponse($schoolFacility->toArray(), 'SchoolFacility updated successfully');
    }

    /**
     * Remove the specified SchoolFacility from storage.
     * DELETE /schoolFacilities/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SchoolFacility $schoolFacility */
        $schoolFacility = $this->schoolFacilityRepository->find($id);

        if (empty($schoolFacility)) {
            return $this->sendError('School Facility not found');
        }

        $schoolFacility->delete();

        return $this->sendResponse($id, 'School Facility deleted successfully');
    }
}
