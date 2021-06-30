<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Admin\Department;
use App\Models\Dashboard\Admin\Page;
use App\Models\Dashboard\Admin\Permission;
use App\Models\Dashboard\Admin\Position;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexOLD(Request $request)
    {
        $users = User::orderBy('id', 'asc')->paginate(10);


//        if($request->ajax()){
//            $roles = Role::where('id', $request->role_id)->first();
//            $permissions = $roles->permissions;
//
//            return $permissions;
//            return $users;
//        }

        $roles = Role::all();
        $departments = Department::all();
        $positions = Position::all();

        return view('dashboard.admin.users.index', [
            // navigation
            'tree' => 'Dashboard',
            'branch' => 'Admin',
            'twig' => 'User Management',
            'leaves' => 'User',

            //query
            'queryA' => $users,
            'roles' => $roles,
            'queryC' => $departments,
            'queryD' => $positions,
        ]);
    }

    public function index(Request $request)
    {
        //set page slug
        $thisPageSlug = 'users'; //change this to this page slug

        $thisPage = Page::where('slug',$thisPageSlug)->first();

        //retrieve user's data
        $getUser = Auth::user();

        //retrieve user's access to page
        $pageAccess = $getUser->positions
            ->first()
            ->pages
            ->where('slug','=',$thisPage->slug)
            ->first();

        //check if this page is added to position list of page under user
        if (!empty($pageAccess) AND $pageAccess->slug = $thisPage->slug)
        {

            //retrieve approved permissions under this page for this user. This is use for create since it is blade based
            $boundPerm = $getUser->positions
                ->first()
                ->permissions
                ->where('pivot.page_id','=',$thisPage->id);

            $permArray = ['read','update','delete'];

            if ($request->ajax()) {
                $data = User::latest()->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('position', function($row){
                        $position = "";

                        foreach ($row->positions as $pos){
                            $position .= '<span class="badge badge-secondary">'.$pos->slug.'</span>';
                        }

                        return $position;
                    })
                    ->addColumn('department', function($row){
                        $department = "";

                        foreach ($row->departments as $dep){
                            $department .= '<span class="badge badge-secondary">'.$dep->name.'</span>';
                        }

                        return $department;
                    })
                    ->addColumn('action', function ($row) {

                        //set page slug
                        $thisPageSlug = 'permissions'; //change this to this page slug

                        $thisPage = Page::where('slug',$thisPageSlug)->first();

                        //get list of permission bounded to this user
                        $boundPerm = Auth::user()->positions
                            ->first()
                            ->permissions
                            ->where('pivot.page_id','=',$thisPage->id);

                        $action = '';

                        if ($boundPerm->where('slug','=','read')->first())
                        {
                            $action .= '<a id="show-data" data-toggle="modal" data-id=' . $row->id . '><i class="fa fa-eye"></i></a>';
                        }
                        if ($boundPerm->where('slug','=','update')->first())
                        {
                            $action .= ' <a id="edit-data" href="users/' . $row->id . '/edit"><i class="fa fa-edit"></i></a>';
                        }
                        if ($boundPerm->where('slug','=','delete')->first())
                        {
                            $action .= '<meta name="csrf-token" content="{{ csrf_token() }}">
                                        <a id="delete-data" data-id=' . $row->id . '><i class="fa fa-trash"></i></a>
                                        ';
                        }
//                        if($boundPerm->where('slug','=',null)){
//                            $action='';
//                        }

                        return $action;

                    })
                    ->rawColumns(['position','department','action'])
                    ->make(true);
            }
        }


        return view('dashboard.admin.users.index', [
            // navigation
            'tree' => 'Dashboard',
            'branch' => 'Admin',
            'twig' => 'User Management',
            'leaves' => 'User'
        ]);
    }

    public function create(Request $request)
    {
        if($request->ajax()){
            $roles = Role::where('id', $request->role_id)->first();
            $permissions = $roles->permissions;

            return $permissions;
        }

        $roles = Role::all();
        $queryA = Department::all();
        $queryB = Position::all();

        return view('dashboard.admin.users.create', [
            // navigation
            'tree' => 'Dashboard',
            'branch' => 'Admin',
            'twig' => 'Users',
            'leaves' => 'Create',

            //query
            'roles' => $roles,
            'queryA' => $queryA,
            'queryB' => $queryB,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        // add foreign key for user and department to users_department table
        if($request->department != null){
            $user->departments()->attach($request->department);
            $user->save();
        }

        // add foreign key for user and position to users_positions table
        if($request->position != null){
            $user->positions()->attach($request->position);
            $user->save();
        }

        if($request->role != null){
            $user->roles()->attach($request->role);
            $user->save();
        }

        if($request->permissions != null){
            foreach ($request->permissions as $permission) {
                $user->permissions()->attach($permission);
                $user->save();
            }
        }

        return redirect('dashboard/admin/users')->with('success', 'The user was added');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        $departments = Department::all();
        $position = Position::all();

        //A refer to HasDepartmentsAndPositions Trait
        $userDepartment = $user->departments;
        $userPosition = $user->positions;

        //B
//        if($userDepartment != null){
//            $rolePermissions = $userDepartment->allRolePermissions;
//        }else{
//            $rolePermissions = null;
//        }

        $userPermissions = $user->permissions;

        // dd($rolePermission);

        return view('dashboard.admin.users.edit', [
            // navigation
            'tree' => 'Dashboard',
            'branch' => 'Admin',
            'twig' => 'User Management',
            'leaves' => 'User',

            //query
            'user'=>$user,
            'queryA' => $departments,
            'queryB' => $position,
            'userDepartment'=>$userDepartment,
            'userPosition'=>$userPosition,
//            'rolePermissions'=>$rolePermissions,
//            'userPermissions'=>$userPermissions
        ]);
    }

    public function update(Request $request, User $user)
    {

        //validate the fields
        $request->validate([
            'initials' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user->lname = $request->lname;
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->initials = $request->initials;
        $user->email = $request->email;
        $user->licnum = $request->licnum;
        $user->designation = $request->designation;
        $user->birthday = $request->birthday;
        if($request->password != null){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        if($request->departments == '0'){
            $user->departments()->detach();
            $user->save();
        } else {
            $user->departments()->detach();
            $user->departments()->attach($request->departments);
            $user->save();
        }

        if($request->positions == '0'){
            $user->positions()->detach();
            $user->save();
        } else {
            $user->positions()->detach();
            $user->positions()->attach($request->positions);
            $user->save();
        }
//
//        $user->departments()->detach();
//        $user->positions()->detach();
//        $user->permissions()->detach();
//
//        if($request->department != null){
//            $user->departments()->attach($request->department);
//            $user->save();
//        }
//
//        if($request->position != null){
//            $user->positions()->attach($request->position);
//            $user->save();
//        }
//
//        if($request->permissions != null){
//            foreach ($request->permissions as $permission) {
//                $user->permissions()->attach($permission);
//                $user->save();
//            }
//        }
        return redirect()->back();
    }

    public function destroy(User $user)
    {
        $user->positions()->detach();
        $user->departments()->detach();
        $user->delete();
    }
}
