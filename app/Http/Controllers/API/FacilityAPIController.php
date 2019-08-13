<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFacilityAPIRequest;
use App\Http\Requests\API\UpdateFacilityAPIRequest;
use App\Models\Facility;
use App\Repositories\FacilityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FacilityController
 * @package App\Http\Controllers\API
 */

class FacilityAPIController extends AppBaseController
{
    /** @var  FacilityRepository */
    private $facilityRepository;

    public function __construct(FacilityRepository $facilityRepo)
    {
        $this->facilityRepository = $facilityRepo;
    }

    /**
     * Display a listing of the Facility.
     * GET|HEAD /facilities
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $facilities = $this->facilityRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($facilities->toArray(), 'Facilities retrieved successfully');
    }

    /**
     * Store a newly created Facility in storage.
     * POST /facilities
     *
     * @param CreateFacilityAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFacilityAPIRequest $request)
    {
        $input = $request->all();

        $facility = $this->facilityRepository->create($input);

        return $this->sendResponse($facility->toArray(), 'Facility saved successfully');
    }

    /**
     * Display the specified Facility.
     * GET|HEAD /facilities/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Facility $facility */
        $facility = $this->facilityRepository->find($id);

        if (empty($facility)) {
            return $this->sendError('Facility not found');
        }

        return $this->sendResponse($facility->toArray(), 'Facility retrieved successfully');
    }

    /**
     * Update the specified Facility in storage.
     * PUT/PATCH /facilities/{id}
     *
     * @param int $id
     * @param UpdateFacilityAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFacilityAPIRequest $request)
    {
        $input = $request->all();

        /** @var Facility $facility */
        $facility = $this->facilityRepository->find($id);

        if (empty($facility)) {
            return $this->sendError('Facility not found');
        }

        $facility = $this->facilityRepository->update($input, $id);

        return $this->sendResponse($facility->toArray(), 'Facility updated successfully');
    }

    /**
     * Remove the specified Facility from storage.
     * DELETE /facilities/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Facility $facility */
        $facility = $this->facilityRepository->find($id);

        if (empty($facility)) {
            return $this->sendError('Facility not found');
        }

        $facility->delete();

        return $this->sendResponse($id, 'Facility deleted successfully');
    }
}
