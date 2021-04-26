<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Page;
use App\Models\Permission;
use App\Models\Position;
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
                    ->addColumn('page', function($row){
//                        $pages = $row->pages;
//
//                        $page = "";
//                        foreach($pages as $pag){
//                            $page .= '<span class="badge badge-secondary">'.$pag->name.'</span>';
//                        }
//
//                        return $page;
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
                            $action .= ' <a id="edit-data" data-toggle="modal" data-id=' . $row->id . '><i class="fa fa-edit"></i></a>';
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
                    ->rawColumns(['page','action'])
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $department = Department::all();
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
            'queryA' => $department,
            'queryB' => $position,
            'userDepartment'=>$userDepartment,
            'userPosition'=>$userPosition,
//            'rolePermissions'=>$rolePermissions,
//            'userPermissions'=>$userPermissions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        //validate the fields
        $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'confirmed',
        ]);

        $user->lname = $request->lname;
        $user->fname = $request->fname;
        $user->username = $request->username;
        $user->email = $request->email;
        if($request->password != null){
            $user->password = Hash::make($request->password);
        }
        $user->save();
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->permissions()->detach();
        $user->delete();
    }
}
