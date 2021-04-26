<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Permission;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class PageCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $permissionlist = Permission::all();
        if ($request->ajax()) {
            $data = Page::latest()->get();
            //Pull all permissions
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tick', function($row){

                    $action = '
                        <input class="custom-control-input checkPag'.$row->id.'" type="checkbox" name="pages[]" id="'.$row->slug.'" value="'.$row->id.'">
                    ';

                    return $action;

                })
                ->addColumn('permission', function($row){
                    $permission = "";

                    foreach ($row->permissions as $perm){
                        $permission .= '<span class="badge badge-secondary">'.substr($perm->name,0,1).'</span>';
                    }

                    return $permission;
                })
                ->addColumn('permissionB', function($row){
                    $permission = "";

                    foreach ($row->permissions as $perm){
                        $permission .= '
                            <div class="input-group">
                                <span class="form-control">
                                    <input type="checkbox" class="custom-control-input checkPerm'.$row->id.'-'.$perm->id.'" name="permissions[]" id="'.$row->slug.'-'.$perm->id.'" value="'.$row->id.'-'.$perm->id.'">
                                </span>
                                <span class="input-group-addon bg-blue">'.substr($perm->name,0,1).'</span>
                            </div>
                        ';
                    }

                    return $permission;
                })
                ->addColumn('action', function($row){

                    $read = '<a id="show-data" data-toggle="modal" data-id='.$row->id.'><i class="fa fa-eye"></i></a>';
                    $edit = ' <a id="edit-data" data-toggle="modal" data-id='.$row->id.'><i class="fa fa-edit"></i></a>';
                    $delete = '<meta name="csrf-token" content="{{ csrf_token() }}">
                        <a id="delete-data" data-id='.$row->id.'><i class="fa fa-trash"></i></a>
                    ';

                    if(Auth::user()->hasPosition('admin')){
                        $action = $read . $edit . $delete;
                    } else {
                        $action ='';
                    }

                    return $action;

                })
                ->rawColumns(['permission','action','tick','permissionB'])
                ->make(true);
        }

        return view('dashboard.admin.pages.index', [
            // navigation
            'tree' => 'Dashboard',
            'branch' => 'Admin',
            'twig' => 'User Management',
            'leaves' => 'Page',

            //query
            'queryA' => $permissionlist
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


        $page = new Page();
        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->save();

        if($request->permissions != null){
            foreach ($request->permissions as $permission) {
                $page->permissions()->attach($permission);
                $page->save();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        $pageperm = $page->permissions->first();

        // If B fetched something post it
        if($pageperm != null){
            $pagePermission = $page->permissions->pluck('name')->toArray();

        }else{
            $pagePermission = null;
        }

        return Response::json([
            $page,
            $pagePermission
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $pageperm = $page->permissions->first();

        // If B fetched something post it
        if($pageperm != null){
            $pagePermission = $page->permissions->pluck('id')->toArray();
        }else{
            $pagePermission = null;
        }

        return Response::json([
            $page,
            $pagePermission
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //validate the fields
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
        ]);

        //update the page name
        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->save();

        //detach page permissions from pages_permissions table
        $page->permissions()->detach();

        ///attach page permissions from pages_permissions table as new permissions
        if($request->permissions != null){
            foreach ($request->permissions as $permission) {
                $page->permissions()->attach($permission);
                $page->save();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //detach page permissions from pages_permissions table
        $page->permissions()->detach();

        //delete page from pages table
        $page->delete();
    }

}
