<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Page;
use App\Models\Permission;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;

class DepartmentCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexOG()
    {
        $departments = Department::orderBy('id', 'asc')->paginate(10);
        return view('dashboard.admin.departments.index', [
            // navigation
            'tree' => 'Dashboard',
            'branch' => 'Admin',
            'twig' => 'User Management',
            'leaves' => 'Departments',

            //query
            'queryA' => $departments,
        ]);
    }
    public function index(Request $request)
    {
        //set page slug
        $thisPageSlug = 'departments'; //change this to this page slug

        //retrieve this page
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
            //done
            if ($request->ajax()) {
                $data = Department::latest()->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {

                        //set page slug
                        $thisPageSlug = 'departments'; //change this to this page slug

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

            return view('dashboard.admin.departments.index', [
                // navigation
                'tree' => 'Dashboard',
                'branch' => 'Admin',
                'twig' => 'User Management',
                'leaves' => 'Department',

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


        $department = new Department();
        $department->name = $request->name;
        $department->slug = $request->slug;
        $department->save();

        $listOfPositions = explode(',', $request->positions);

//        foreach ($listOfPositions as $position) {
//            $positions = new Position();
//            $positions->name = $position;
//            $positions->slug = strtolower(str_replace(" ", "-", $position));
//            $positions->save();
//            $department->positions()->attach($positions->id);
//            $department->save();
//        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return Response::json($department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {

        //validate the fields
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
        ]);

        $department->name = $request->name;
        $department->slug = $request->slug;
        $department->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
    }
}
