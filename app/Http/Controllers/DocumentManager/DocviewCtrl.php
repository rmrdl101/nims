<?php

namespace App\Http\Controllers\DocumentManager;

use App\Http\Controllers\Controller;
use App\Models\DocumentManager\Docview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Validator;

class DocviewCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */

    public function storepath (Request $req){
        $path = $req->path;
        Session::put("sessionPath",$path);
//        return $_POST;
    }

    public function index(Request $request)
    {

        // Session::put("sessionPath",'');
        $rootDir = Storage::directories('documents');
        $dataS = Storage::allFiles('documents\Document Controlled Form');


        if ($request->ajax()) {

            $path = Session::get("sessionPath") ? Session::get("sessionPath"): 'documents';
            $data = Storage::files($path);
            return DataTables::of($data)
                ->addColumn('docCode', function ($row){
                    $docName = pathinfo($row, PATHINFO_FILENAME);
                    $docCode = explode("_",$docName,3)[0];
                    return $docCode;
                })
                ->addColumn('docRev', function ($row){
                    $docFName = pathinfo($row, PATHINFO_FILENAME);
                    $docRev = explode("_",$docFName, 3)[1];
                    return $docRev;
                })
                ->addColumn('docName', function ($row){
                    $docFName = pathinfo($row, PATHINFO_FILENAME);
                    $docName = explode("_",$docFName, 3)[2];
                    return $docName;
                })
                ->addColumn('docExt', function ($row){
                    $docExt = pathinfo($row, PATHINFO_EXTENSION);
                    return $docExt;
                })
                ->addColumn('action', function ($row){
                    $docFName = pathinfo($row, PATHINFO_FILENAME);
                    $docName = explode("_",$docFName, 3)[2];

                    $action = '';
                    $action .= '<a id="view-doc" file-name="'.$docName.'" data-src="'.asset(str_replace('documents/','storage/', $row)).'"  data-toggle="modal" data-target="#modal-default"><i class="fa fa-eye"></i></a> ';
                    $action .= ' <a id="view-doc" data-toggle="modal" data-src="'. $row .'"  ><i class="fa fa-download"></i></a>';
                    $action .= '<meta name="csrf-token" content="{{ csrf_token() }}">
                                        <a id="delete-data" data-path="' . $row . '"><i class="fa fa-trash text-danger"></i></a>
                                ';
                    return $action;
                })
                ->rawColumns(['docCode','docRev','docName','docExt','action'])
                ->make(true);
        }

        return view('dashboard.document-manager.index', [
            // navigation
            'tree' => 'Document Manager',
            'branch' => '',
            'twig' => '',
            'leaves' => '',

            'root' => $rootDir,
            'dataS' => $dataS,
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocumentManager\Docview  $docview
     * @return \Illuminate\Http\Response
     */
    public function show(Docview $docview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocumentManager\Docview  $docview
     * @return \Illuminate\Http\Response
     */
    public function edit(Docview $docview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DocumentManager\Docview  $docview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docview $docview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocumentManager\Docview  $docview
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docview $docview)
    {
       //
    }

    public function fileTree(Request $request)
    {
        if ($request->ajax()) {

            $root = Storage::directories('documents');
            $folder ='';
            foreach($root as $rootDir)
            {
                $folder .= '<li class="folder" data-name="'. str_replace('documents/','', $rootDir)  .'"><a href="#" class="folder-name" path="'. $rootDir .'" data-name="'. str_replace('documents/','', $rootDir)  .'">'. str_replace('documents/','', $rootDir)  .'</a>';

                $folder .='<ul>';

                $subDirA = Storage::directories($rootDir);
                foreach($subDirA as $itemA)
                {
                    $folder .= '<li class="sub-folder-A"><a href="#" class="folder-name" path="'.$itemA.'" data-name="'.str_replace('documents/','', $itemA).'">'.str_replace($rootDir.'/','', $itemA).'</a>';

                    $folder .='<ul>';

                    $subDirB = Storage::directories($itemA);
                    foreach($subDirB as $itemB)
                    {
                        $folder .= '<li class="sub-folder-B"><a href="#" class="folder-name" path="'.$itemB.'" data-name="'.str_replace('documents/','', $itemB).'">'.str_replace($itemA.'/','', $itemB).'</a>';

                        $folder .='<ul>';

                        $subDirC = Storage::directories($itemB);
                        foreach($subDirC as $itemC)
                        {
                            $folder .= '<li class="sub-folder-C"><a href="#" class="folder-name" path="'.$itemC.'" data-name="'.str_replace('documents/','', $itemC).'">'.str_replace($itemB.'/','', $itemC).'</a>';

                            $folder .='<ul>';
                            $folder .='</ul>';
                        }
                        $folder .='</ul></li>';
                    }
                    $folder .='</ul></li>';
                }
                $folder .='</ul></li>';
            }


//            @foreach( \Illuminate\Support\Facades\Storage::directories($subDir1) as $subDir2)
//                                                <li><a href="#" class="folder-name" path="{{ $subDir2 }}" data-name="{{ str_replace('documents/','', $subDir2) }}">{{ str_replace($subDir1.'/','', $subDir2) }}</a>
//                                                    <ul>
//            @foreach( \Illuminate\Support\Facades\Storage::directories($subDir2) as $subDir3)
//                                                            <li><a href="#" class="folder-name" path="{{ $subDir3 }}" data-name="{{ str_replace('documents/','', $subDir3) }}">{{ str_replace($subDir2.'/','', $subDir3) }}</a>
//                                                                <ul></ul>
//                                                            </li>
//            @endforeach
//                                                    </ul>
//                                                </li>
//            @endforeach
//                                        </ul>
//                                    </li>
//            @endforeach
//                                </ul>
//                            </li>
//            @endforeach

            return $folder;
        }

//        if ($request->ajax()) {
//            $data = Storage::directories('documents');
//            return DataTables::of($data)
//                ->addColumn('folder', function ($row) {
////                    foreach($row as $rootDir){
//
//                        $folder = '<li><a href="#" class="folder-name" path="'.$row.'" data-name="'.str_replace('documents/','', $row).'">'.str_replace('documents/','', $row).'</a>';
//
//                        $subDirA = Storage::directories($row);
//                        foreach($subDirA as $itemA)
//                        {
//                            $folder .='<ul>';
//                            $folder .= '<li><a href="#" class="folder-name" path="'.$itemA.'" data-name="'.str_replace('documents/','', $itemA).'">'.str_replace($row.'/','', $itemA).'</li>';
//                            $subDirB = Storage::directories($itemA);
//                            foreach($subDirB as $itemB)
//                            {
//                                $folder .='<ul>';
//                                $folder .= $itemB;
//                                $folder .='</ul>';
//                            }
//                            $folder .='</ul>';
//                        }
//
//
////                    }
////                    @foreach( \Illuminate\Support\Facades\Storage::directories($rootDir) as $subDir1)
////                                    <li><a href="#"  class="folder-name" path="{{ $subDir1 }}" data-name="{{ str_replace('documents/','', $subDir1) }}">{{ str_replace($rootDir.'/','', $subDir1) }}</a>
////                                        <ul>
////                    @foreach( \Illuminate\Support\Facades\Storage::directories($subDir1) as $subDir2)
////                                                <li><a href="#" class="folder-name" path="{{ $subDir2 }}" data-name="{{ str_replace('documents/','', $subDir2) }}">{{ str_replace($subDir1.'/','', $subDir2) }}</a>
////                                                    <ul>
////                    @foreach( \Illuminate\Support\Facades\Storage::directories($subDir2) as $subDir3)
////                                                            <li><a href="#" class="folder-name" path="{{ $subDir3 }}" data-name="{{ str_replace('documents/','', $subDir3) }}">{{ str_replace($subDir2.'/','', $subDir3) }}</a>
////                                                                <ul></ul>
////                                                            </li>
////                    @endforeach
////                                                    </ul>
////                                                </li>
////                    @endforeach
////                                        </ul>
////                                    </li>
////                    @endforeach
////                                </ul>
////                            </li>
////                    @endforeach
//
//
//
//
////                    $folder = str_replace('documents/', '', $row);
//                    return $folder;
//                })
//                ->rawColumns(['folder'])
//                ->make(true);
//        }
    }

    public function newFolder(Request $request){

//        return $request;
        //validate the fields
//        $request->validate([
//            'name' => 'required|max:255',
//            'froute' => 'required'
//        ]);

        Storage::makeDirectory($request->input('fpath').'/'.$request->input('fname'));
        return $request;
    }
    public function deleteFolder(Request $request){

//        return $request;
        //validate the fields
//        $request->validate([
//            'name' => 'required|max:255',
//            'froute' => 'required'
//        ]);

        Storage::deleteDirectory($request->input('fpath'));
        return $request;
    }

    public function upload(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'select_file' => 'image|file|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if($validation->passes())
        {
            $paths = [];
            $files = $request->file('files');

            foreach ($files as $file)
            {
                // Generate a file name with extension
                $fileName = $file->getClientOriginalName();

                // Save the file
                $paths[] = $file->storeAs($request->route, $fileName);
            }
        }
        else
        {

        }
    }

    public function fdelete(Request $request)
    {
        Storage::delete($request->input('fpath'));
    }

    public function fdownload(Request $request)
    {
        Storage::get($request->input('fpath'));
    }
}
