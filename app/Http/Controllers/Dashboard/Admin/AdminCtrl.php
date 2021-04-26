<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(5);
        $roles = Role::orderBy('id', 'desc');
        $permissions = Permission::orderBy('id', 'desc');



        return view('dashboard.admin.index', [
            // navigation
            'tree' => 'Dashboard',
            'branch' => 'Admin',
            'twig' => 'Index',
            'leaves' => '',

            //query
            'users' => $users,
            'roles' => $roles,
            'permissions' => $permissions
        ]);
    }
}
