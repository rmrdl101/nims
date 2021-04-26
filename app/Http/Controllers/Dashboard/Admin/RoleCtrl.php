<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'asc')->paginate(10);
        return view('dashboard.admin.roles-and-permissions.index', [
            // navigation
            'tree' => 'Dashboard',
            'branch' => 'Admin',
            'twig' => 'Roles & Permissions',
            'leaves' => '',

            //query
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255'
        ]);


        $role = new Role();
        $role->name = $request->name;
        $role->slug = $request->slug;
        $role->save();

        $listOfPermissions = explode(',', $request->permissions);

        foreach ($listOfPermissions as $permission) {
            $permissions = new Permission();
            $permissions->name = $permission;
            $permissions->slug = strtolower(str_replace(" ", "-", $permission));
            $permissions->save();
            $role->permissions()->attach($permissions->id);
            $role->save();
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
//        dd($role);
        $role->permissions()->delete();
        $role->delete();
        $role->permissions()->detach();

        return redirect()->back();

    }
}
