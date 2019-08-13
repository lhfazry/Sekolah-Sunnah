<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLevelAPIRequest;
use App\Http\Requests\API\UpdateLevelAPIRequest;
use App\Models\Level;
use App\Repositories\LevelRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LevelController
 * @package App\Http\Controllers\API
 */

class LevelAPIController extends AppBaseController
{
    /** @var  LevelRepository */
    private $levelRepository;

    public function __construct(LevelRepository $levelRepo)
    {
        $this->levelRepository = $levelRepo;
    }

    /**
     * Display a listing of the Level.
     * GET|HEAD /levels
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $levels = $this->levelRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($levels->toArray(), 'Levels retrieved successfully');
    }

    /**
     * Store a newly created Level in storage.
     * POST /levels
     *
     * @param CreateLevelAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLevelAPIRequest $request)
    {
        $input = $request->all();

        $level = $this->levelRepository->create($input);

        return $this->sendResponse($level->toArray(), 'Level saved successfully');
    }

    /**
     * Display the specified Level.
     * GET|HEAD /levels/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Level $level */
        $level = $this->levelRepository->find($id);

        if (empty($level)) {
            return $this->sendError('Level not found');
        }

        return $this->sendResponse($level->toArray(), 'Level retrieved successfully');
    }

    /**
     * Update the specified Level in storage.
     * PUT/PATCH /levels/{id}
     *
     * @param int $id
     * @param UpdateLevelAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLevelAPIRequest $request)
    {
        $input = $request->all();

        /** @var Level $level */
        $level = $this->levelRepository->find($id);

        if (empty($level)) {
            return $this->sendError('Level not found');
        }

        $level = $this->levelRepository->update($input, $id);

        return $this->sendResponse($level->toArray(), 'Level updated successfully');
    }

    /**
     * Remove the specified Level from storage.
     * DELETE /levels/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Level $level */
        $level = $this->levelRepository->find($id);

        if (empty($level)) {
            return $this->sendError('Level not found');
        }

        $level->delete();

        return $this->sendResponse($id, 'Level deleted successfully');
    }
}
