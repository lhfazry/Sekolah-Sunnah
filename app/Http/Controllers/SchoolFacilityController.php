<?php

namespace App\Http\Controllers;

use App\DataTables\SchoolFacilityDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSchoolFacilityRequest;
use App\Http\Requests\UpdateSchoolFacilityRequest;
use App\Repositories\SchoolFacilityRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SchoolFacilityController extends AppBaseController
{
    /** @var  SchoolFacilityRepository */
    private $schoolFacilityRepository;

    public function __construct(SchoolFacilityRepository $schoolFacilityRepo)
    {
        $this->schoolFacilityRepository = $schoolFacilityRepo;
    }

    /**
     * Display a listing of the SchoolFacility.
     *
     * @param SchoolFacilityDataTable $schoolFacilityDataTable
     * @return Response
     */
    public function index(SchoolFacilityDataTable $schoolFacilityDataTable)
    {
        return $schoolFacilityDataTable->render('school_facilities.index');
    }

    /**
     * Show the form for creating a new SchoolFacility.
     *
     * @return Response
     */
    public function create()
    {
        return view('school_facilities.create');
    }

    /**
     * Store a newly created SchoolFacility in storage.
     *
     * @param CreateSchoolFacilityRequest $request
     *
     * @return Response
     */
    public function store(CreateSchoolFacilityRequest $request)
    {
        $input = $request->all();

        $schoolFacility = $this->schoolFacilityRepository->create($input);

        Flash::success('School Facility saved successfully.');

        return redirect(route('schoolFacilities.index'));
    }

    /**
     * Display the specified SchoolFacility.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $schoolFacility = $this->schoolFacilityRepository->find($id);

        if (empty($schoolFacility)) {
            Flash::error('School Facility not found');

            return redirect(route('schoolFacilities.index'));
        }

        return view('school_facilities.show')->with('schoolFacility', $schoolFacility);
    }

    /**
     * Show the form for editing the specified SchoolFacility.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $schoolFacility = $this->schoolFacilityRepository->find($id);

        if (empty($schoolFacility)) {
            Flash::error('School Facility not found');

            return redirect(route('schoolFacilities.index'));
        }

        return view('school_facilities.edit')->with('schoolFacility', $schoolFacility);
    }

    /**
     * Update the specified SchoolFacility in storage.
     *
     * @param  int              $id
     * @param UpdateSchoolFacilityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSchoolFacilityRequest $request)
    {
        $schoolFacility = $this->schoolFacilityRepository->find($id);

        if (empty($schoolFacility)) {
            Flash::error('School Facility not found');

            return redirect(route('schoolFacilities.index'));
        }

        $schoolFacility = $this->schoolFacilityRepository->update($request->all(), $id);

        Flash::success('School Facility updated successfully.');

        return redirect(route('schoolFacilities.index'));
    }

    /**
     * Remove the specified SchoolFacility from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $schoolFacility = $this->schoolFacilityRepository->find($id);

        if (empty($schoolFacility)) {
            Flash::error('School Facility not found');

            return redirect(route('schoolFacilities.index'));
        }

        $this->schoolFacilityRepository->delete($id);

        Flash::success('School Facility deleted successfully.');

        return redirect(route('schoolFacilities.index'));
    }
}
