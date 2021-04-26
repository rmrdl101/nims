<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Position;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class PositionCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Position::with('pages', 'permissions')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('page', function($row){
                    $pages = $row->pages;

                    $page = "";
                    foreach($pages as $pag){
                        $page .= '<span class="badge badge-secondary">'.$pag->name.'</span>';
                    }

                    return $page;
                })
                ->addColumn('permission', function($row){
                    $permissions = $row->permissions;

                    $permission = "";
                    foreach($permissions as $perm){
                        $permission .= '<span class="badge badge-secondary">'.$perm->pivot->page->name.'-'.$perm->name[0].'</span>';
//                        $permission .= '<span class="badge badge-secondary">'.$perm->pivot->page.'</span>';
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
                ->rawColumns(['page', 'permission', 'action'])
                ->make(true);
        }

        return view('dashboard.admin.positions.index', [
            // navigation
            'tree' => 'Dashboard',
            'branch' => 'Admin',
            'twig' => 'User Management',
            'leaves' => 'Position',
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


        $position = new Position();
        $position->name = $request->name;
        $position->slug = $request->slug;
        $position->save();

        if($request->pages != null){
            foreach ($request->pages as $page) {
                $position->pages()->attach($page);
                $position->save();

                if($request->permissions != null){
                    foreach ($request->permissions as $permission) {
                        $pagPer = explode("-", $permission);
                        $position->permissions()->attach($pagPer[1],['page_id' => $pagPer[0]]);
                        $position->save();
                    }
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position0
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        return view('dashboard.admin.positions.show', [
            // navigation
            'tree' => 'Dashboard',
            'branch' => 'Admin',
            'twig' => 'User Management',
            'leaves' => 'Positions',

            'position' => $position
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit( Position $position)
    {
        $pagePos = $position->pages;
        $pagePerm = $position->permissions;

        return Response::json([
            $position,
            $pagePos,
            $pagePerm
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        //validate the fields
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
        ]);

        $position->name = $request->name;
        $position->slug = $request->slug;
        $position->save();

        if($request->pages != null){
            $position->pages()->sync($request->pages);
        }

        $position->permissions()->detach();

        if($request->permissions != null){
            foreach ($request->permissions as $permission) {
                $pagPer = explode("-", $permission);
                $position->permissions()->attach($pagPer[1],['page_id' => $pagPer[0]]);
                $position->save();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        $position->pages()->detach();
        $position->permissions()->detach();
        $position->delete();
    }

    public function page(Request $request)
    {
        if ($request->ajax()) {
            $data = Page::latest()->get();
            //Pull all permissions
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('permission', function($row){
                    $permission = "";

                    foreach ($row->permissions as $perm){
                        $permission .= '<span class="badge badge-secondary">'.substr($perm->name,0,1).'</span>';
                    }

                    return $permission;
                })
                ->addColumn('action', function($row){

                    $action = '
                        <a id="show-data" data-toggle="modal" data-id='.$row->id.'><i class="fa fa-eye"></i></a>
                        <a id="edit-data" data-toggle="modal" data-id='.$row->id.'><i class="fa fa-edit"></i></a>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <a id="delete-data" data-id='.$row->id.'><i class="fa fa-trash"></i></a>
                    ';

                    return $action;

                })
                ->rawColumns(['permission','action'])
                ->make(true);
        }
    }
}
