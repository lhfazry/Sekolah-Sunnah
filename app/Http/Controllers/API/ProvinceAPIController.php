<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProvinceAPIRequest;
use App\Http\Requests\API\UpdateProvinceAPIRequest;
use App\Models\Province;
use App\Repositories\ProvinceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProvinceController
 * @package App\Http\Controllers\API
 */

class ProvinceAPIController extends AppBaseController
{
    /** @var  ProvinceRepository */
    private $provinceRepository;

    public function __construct(ProvinceRepository $provinceRepo)
    {
        $this->provinceRepository = $provinceRepo;
    }

    /**
     * Display a listing of the Province.
     * GET|HEAD /provinces
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $provinces = $this->provinceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($provinces->toArray(), 'Provinces retrieved successfully');
    }

    /**
     * Store a newly created Province in storage.
     * POST /provinces
     *
     * @param CreateProvinceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProvinceAPIRequest $request)
    {
        $input = $request->all();

        $province = $this->provinceRepository->create($input);

        return $this->sendResponse($province->toArray(), 'Province saved successfully');
    }

    /**
     * Display the specified Province.
     * GET|HEAD /provinces/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Province $province */
        $province = $this->provinceRepository->find($id);

        if (empty($province)) {
            return $this->sendError('Province not found');
        }

        return $this->sendResponse($province->toArray(), 'Province retrieved successfully');
    }

    /**
     * Update the specified Province in storage.
     * PUT/PATCH /provinces/{id}
     *
     * @param int $id
     * @param UpdateProvinceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProvinceAPIRequest $request)
    {
        $input = $request->all();

        /** @var Province $province */
        $province = $this->provinceRepository->find($id);

        if (empty($province)) {
            return $this->sendError('Province not found');
        }

        $province = $this->provinceRepository->update($input, $id);

        return $this->sendResponse($province->toArray(), 'Province updated successfully');
    }

    /**
     * Remove the specified Province from storage.
     * DELETE /provinces/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Province $province */
        $province = $this->provinceRepository->find($id);

        if (empty($province)) {
            return $this->sendError('Province not found');
        }

        $province->delete();

        return $this->sendResponse($id, 'Province deleted successfully');
    }
}
