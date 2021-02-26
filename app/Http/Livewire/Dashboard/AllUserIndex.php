<?php

namespace App\Http\Livewire\Dashboard;

use App\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class AllUserIndex extends Component
{
    use WithPagination;

    public $limit = 10;
    public $searchKeyword;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $roles = Role::has('users')->pluck('name');

        $query = User::query()->has('roles');

        if (request('roles')) {
            $userRole = request('roles');

            $allUsers = $query->when($userRole, function ($query, $userRole){
                $query->withRolesFilter($userRole);
            })->search($this->searchKeyword)->paginate($this->limit)->withQueryString();

        } else {
            // $allUsers = $query->withoutSuperAdmin()->get();

            $allUsers = $query->get_All_User_WithDoesntHave_SuperAdmin_Role()->search($this->searchKeyword)->paginate($this->limit)->withQueryString();
        }
        return view('livewire.dashboard.all-user-index', compact('allUsers','roles'));
    }
}
