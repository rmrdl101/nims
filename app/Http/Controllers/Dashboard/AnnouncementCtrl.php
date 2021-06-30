<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Announcement;
use Illuminate\Http\Request;

use App\Models\Dashboard\Admin\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;

class AnnouncementCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //set page slug | change this to this page slug
        $thisPageSlug = 'announcements';

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
                $data = Announcement::latest()->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {

                        //set page slug | change this to this page slug
                        $thisPageSlug = 'announcements';

                        $thisPage = Page::where('slug',$thisPageSlug)->first();

                        //get list of permission bounded to this user for this page
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

                        return $action;

                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

            return view('dashboard.announcements.index', [
                // navigation
                'tree' => 'Dashboard',
                'branch' => 'Announcement',
                'twig' => '',
                'leaves' => '',

                //permission
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
            'title' => 'required|max:255',
            'contents' => 'required|max:255'
        ]);

        $announce = new Announcement();
        $announce->title = $request->title;
        $announce->contents = $request->contents;
        $announce->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dashboard\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        return Response::json($announcement);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        return Response::json($announcement);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        //validate the fields
        $request->validate([
            'title' => 'required|max:255',
            'contents' => 'required|max:255',
        ]);

        $announcement->title = $request->title;
        $announcement->contents = $request->contents;
        $announcement->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
    }
}
