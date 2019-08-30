<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Department;
use App\AccountabilityForm;

use Carbon\Carbon;
use Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = Department::all();
        $roles = Role::all();

        return view('users.create')
            ->with('department', $department)
            ->with('roles', $roles)
            ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|min:3|max:50',
        //     'email' => 'email',
        //     'vat_number' => 'max:13',
        //     'password' => 'required|confirmed|min:6',
        // ]);

        // Validation
        $request->validate([
            // 'name' => 'required|min:3|max:50',
            'email' => 'email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
        ]);

        $user = new User;
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->phone = $request->get('phone');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->last_name = $request->get('last_name');
        $user->position = $request->get('position');
        // $user->positions_id = $request->get('positions_id');
        $user->departments_id = $request->get('departments_id');
        $user->roles_id = $request->get('roles_id');
        $user->save();

        return redirect()->route('users.index')->with('success','Users Created ');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        // Shows equipment on hand
        $acc_forms = AccountabilityForm::join('equipment', 'accountability_forms.equipment_id', '=', 'equipment.id')
            ->where('equipment_statuses_id', 1)
            ->where('employees_id', $user->id)
            ->get();

        return view('users.show')
            ->with('user', $user)
            ->with('acc_forms', $acc_forms)
            ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $department = Department::all();
        $roles = Role::all();

        return view('users.edit')
            ->with('user', $user)
            ->with('department', $department)
            ->with('roles', $roles)
            ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->phone = $request->get('phone');
        $user->email = $request->get('email');
        // $user->password = Hash::make($request->get('password'));
        $user->last_name = $request->get('last_name');
        $user->position = $request->get('position');
        // $user->positions_id = $request->get('positions_id');
        $user->departments_id = $request->get('departments_id');
        $user->roles_id = $request->get('roles_id');
        $user->save();

        return redirect()->route('users.index')->with('success','Users Created ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
