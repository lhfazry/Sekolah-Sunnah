<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCityAPIRequest;
use App\Http\Requests\API\UpdateCityAPIRequest;
use App\Models\City;
use App\Repositories\CityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CityController
 * @package App\Http\Controllers\API
 */

class CityAPIController extends AppBaseController
{
    /** @var  CityRepository */
    private $cityRepository;

    public function __construct(CityRepository $cityRepo)
    {
        $this->cityRepository = $cityRepo;
    }

    /**
     * Display a listing of the City.
     * GET|HEAD /cities
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $cities = $this->cityRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($cities->toArray(), 'Cities retrieved successfully');
    }

    /**
     * Store a newly created City in storage.
     * POST /cities
     *
     * @param CreateCityAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCityAPIRequest $request)
    {
        $input = $request->all();

        $city = $this->cityRepository->create($input);

        return $this->sendResponse($city->toArray(), 'City saved successfully');
    }

    /**
     * Display the specified City.
     * GET|HEAD /cities/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var City $city */
        $city = $this->cityRepository->find($id);

        if (empty($city)) {
            return $this->sendError('City not found');
        }

        return $this->sendResponse($city->toArray(), 'City retrieved successfully');
    }

    /**
     * Update the specified City in storage.
     * PUT/PATCH /cities/{id}
     *
     * @param int $id
     * @param UpdateCityAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCityAPIRequest $request)
    {
        $input = $request->all();

        /** @var City $city */
        $city = $this->cityRepository->find($id);

        if (empty($city)) {
            return $this->sendError('City not found');
        }

        $city = $this->cityRepository->update($input, $id);

        return $this->sendResponse($city->toArray(), 'City updated successfully');
    }

    /**
     * Remove the specified City from storage.
     * DELETE /cities/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var City $city */
        $city = $this->cityRepository->find($id);

        if (empty($city)) {
            return $this->sendError('City not found');
        }

        $city->delete();

        return $this->sendResponse($id, 'City deleted successfully');
    }
}
