<?php

namespace App\Http\Controllers\RoleManagement;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Role::class, 'role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $allRole = Role::all();
        $allRole = Role::with('permissions')->get();

        return view('role_management.role.index',compact('allRole'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('role_management.role.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:roles|max:50',
            'permission' => 'exists:permissions,id'
        ]);
        // dd(request('permission'));
        $role = Role::create($validatedData);

        $role->syncPermissions($request->permission);

        return redirect(route('role.index'))->withMessage('Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('role_management.role.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        try {
            $allPermissions = Permission::pluck('name','id');

            $role->load('permissions');

        } catch (RelationNotFoundException $exception) {
            return view('errors._relation_not_found_exception');

        } catch (ModelNotFoundException $exception) {
            return view('errors._model_not_found_exception');

        }

        return view('role_management.role.edit',compact('role','allPermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:roles,name,'.$role->id.'|max:50',
            'permission' => 'exists:permissions,id'
        ]);

        $role->update($validatedData);

        $role->syncPermissions(request('permission'));

        return redirect(route('role.index'))->withInfo('Role updated successfully');
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
