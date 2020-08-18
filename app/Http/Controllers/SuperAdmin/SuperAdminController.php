<?php

namespace App\Http\Controllers\SuperAdmin;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $roles = Role::get();
        return view('dashboard',compact('roles'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => 'not_in:0',
        ]);

        $input = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $input->assignRole(2); // Role(2) => Admin Role(3) => User

        return redirect()->back()->with('status','Admin ' .$input['name']. ' created successfully');
    }

    public function getAllUsers() {

        $roles = Role::all()->pluck('name');

        $query = User::with('roles');

        if (request('roles')) {
            $userRole = request('roles');

            $allUsers = $query->when($userRole, function ($query, $userRole){
                $query->withRolesFilter($userRole);
            })->get();

        } else {
            $allUsers = $query->withoutSuperAdmin()->get();
        }
        return view('users.lists',compact('allUsers','roles'));
    }
}
