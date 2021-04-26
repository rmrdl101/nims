<?php
/**
    Controller for NIMS version 1.0
    lastEditDate="3-10-2021"
    lastEditBy="Roland Lagos"
    lastEditMade
        -Change action are to detect user position and permission
 */
namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Permission;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class PermissionCtrl extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Exception
     */
    public function indexTEST(Request $request)
    {
        //set page slug
        $thisPageSlug = 'permissions'; //change this to this page slug

        $thisPage = Page::where('slug',$thisPageSlug)->first();

        //retrieve user's data
        $getUser = Auth::user();

        $boundPerm = $getUser->positions
            ->first()
            ->permissions
            ->where('pivot.page_id','=',$thisPage->id);

       return $boundPerm->first()->slug;
    }

    public function index(Request $request)
    {
        //set page slug
        $thisPageSlug = 'permissions'; //change this to this page slug

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
        if (!empty($pageAccess) AND $pageAccess->slug = $thisPage->slug){

            //retrieve approved permissions under this page for this user. This is use for create since it is blade based
            $boundPerm = $getUser->positions
                ->first()
                ->permissions
                ->where('pivot.page_id','=',$thisPage->id);

            $permArray = ['read','update','delete'];

            if ($request->ajax()) {
                $data = Permission::latest()->get();
                return DataTables::of($data)
                    ->addIndexColumn()
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
                    ->rawColumns(['action'])
                    ->make(true);
            }

            return view('dashboard.admin.permissions.index', [
                // navigation
                'tree' => 'Dashboard',
                'branch' => 'Admin',
                'twig' => 'User Management',
                'leaves' => 'Permission',

                'boundPerm' => $boundPerm,
                'permArray' => $permArray,
                'create' => $boundPerm->where('slug','=','create')->first(),
                'read' => $boundPerm->where('slug','=','read')->first(),
                'update' => $boundPerm->where('slug','=','update')->first(),
                'delete' => $boundPerm->where('slug','=','delete')->first()


            ]);

        }else{
            return redirect('dashboard')->with('warning', 'Sorry, the page you do not have the permission to access this page. Kindly contact the system administrator. Thank you!');
        }
    }


    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the fields
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
        ]);

        $permission = new Permission();

        $permission->name = $request->name;
        $permission->slug = $request->slug;
        $permission->save();

//        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return Response::json($permission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return Response::json($permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //validate the fields
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
        ]);

        $permission->name = $request->name;
        $permission->slug = $request->slug;
        $permission->save();

//        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
//        return redirect()->back();
    }
}
