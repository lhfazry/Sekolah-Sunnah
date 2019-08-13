<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserNotification;
use Validator;
use App\Models\Role;
use App\Models\Division;
use App\Models\Department;
use App\User;
use App\Models\UserEmployee;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param UserDataTable $userDataTable
     * @return Response
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('users.index');
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        //$users = \App\Models\UserEmployee::with('user')->get()->pluck('user.name', 'id');
        //$users = $this->dropDown(\App\Models\UserEmployee::with('user')->get(), 'user.name', 'id', 'Select an Option');//['' => 'Select an Option'] + $users->all();

        /*$divisions = \App\Models\Division::all();
        $departments = \App\Models\Department::all();
        $areas = \App\Models\Area::all();
        $locations = \App\Models\Location::all();

        $departments = $this->dropDown($departments, 'name', 'id', 'Select an Option');
        $divisions = $this->dropDown($divisions, 'name', 'id', 'Select an Option');//$divisions->pluck('name', 'id');
        $areas = $this->dropDown($areas, 'name', 'id', 'Select an Option');
        $locations = $this->dropDown($locations, 'name', 'id', 'Select an Option');//$locations->pluck('name', 'id'); */

        return view('users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = $this->userRepository->create($input);

        if(!empty($user)) {
            $user->role = $input['role'];
            $user->save();

            \App\User::find($user->id)->assignRole($input['role']);
        }

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findWithoutFail($id);
        $userEmployee = \App\Models\UserEmployee::where('user_id', $user->id)->first();

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show', compact('userEmployee'))->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }


        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $input = [];

        if(trim(Input::get('password')) == '') {
            $input = $request->except(['password']);
        }
        else {
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
        }

        $user = $this->userRepository->update($input, $id);

        if(!empty($user)) {
            $user = \App\User::find($user->id);
            $user->removeRole($user->role);

            $user->save();
            $user->assignRole($input['role']);
        }

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }

    public function profile() {
        $userEmployee = \App\Models\UserEmployee::me();
        return view('users.profile', compact('userEmployee'));
    }

    public function remove_profile($id) {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $userEmployee = \App\Models\UserEmployee::where('user_id', $user->id)->first();

        if(!empty($userEmployee)) {
            $userEmployee->profile_image = null;
            $userEmployee->save();
            Flash::success('Profile image has been removed');

            return redirect(route('users.edit', [$id]));
        }
    }

    public function import() {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load(public_path('users.xlsx'));
        $rows = $spreadsheet->getActiveSheet()->toArray();

        foreach($rows as $k => $row) {
            if($k > 3 && $k < 37) {
                $ce_name = ucwords(strtolower(trim($row[1])));
                $ce_email = trim($row[2]);
                $cm_name = ucwords(strtolower(trim($row[3])));
                $cm_email = trim($row[4]);
                $sm_name = ucwords(strtolower(trim($row[5])));
                $sm_email = trim($row[6]);
                $department = trim($row[9]);
                $division_id = 3;

                $department = Department::firstOrCreate(['division_id' => $division_id, 'name' => $department]);

                $password = Hash::make('zhp7y4sn');

                $user_ce = User::firstOrNew(['email' => $ce_email]);
                $user_ce->name = $ce_name;
                $user_ce->password = $password;
                $user_ce->save();

                $user_cm = User::firstOrNew(['email' => $cm_email]);
                $user_cm->name = $cm_name;
                $user_cm->password = $password;
                $user_cm->save();

                $user_sm = User::firstOrNew(['email' => $sm_email]);
                $user_sm->name = $sm_name;
                $user_sm->password = $password;
                $user_sm->save();

                $user_sm->assignRole(Role::ROLE_SM);
                $user_cm->assignRole(Role::ROLE_CM);
                $user_ce->assignRole(Role::ROLE_CE);

                $ue_sm = UserEmployee::firstOrNew(['user_id' => $user_sm->id]);
                $ue_sm->user_id = $user_sm->id;
                $ue_sm->name = $sm_name;
                $ue_sm->role = Role::ROLE_SM;
                $ue_sm->division_id = $division_id;
                $ue_sm->save();

                $ue_cm = UserEmployee::firstOrNew(['user_id' => $user_cm->id]);
                $ue_cm->user_id = $user_cm->id;
                $ue_cm->manager_id = $ue_sm->id;
                $ue_cm->name = $cm_name;
                $ue_cm->role = Role::ROLE_CM;
                $ue_cm->division_id = $division_id;
                $ue_cm->department_id = $department->id;
                $ue_cm->save();

                $ue_ce = UserEmployee::firstOrNew(['user_id' => $user_ce->id]);
                $ue_ce->user_id = $user_ce->id;
                $ue_ce->manager_id = $ue_cm->id;
                $ue_ce->name = $ce_name;
                $ue_ce->role = Role::ROLE_CE;
                $ue_ce->division_id = $division_id;
                $ue_ce->department_id = $department->id;
                $ue_ce->save();
            }
        }

        echo "Success. Users has been imported. Total row: ". sizeof($rows);
    }

    public function cleaning_user_employees() {
        $count = \App\Models\UserEmployee::whereHas('user', function ($query){
            $query->whereNotNull('deleted_at');
        })->delete();

        echo "Success:". $count;
    }
}
