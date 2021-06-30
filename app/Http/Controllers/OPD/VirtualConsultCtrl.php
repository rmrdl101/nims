<?php

namespace App\Http\Controllers\OPD;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Admin\Page;
use App\Models\OPD\VirtualConsult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;

class VirtualConsultCtrl extends Controller
{

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
                $data = VirtualConsult::latest()->where('status','pending')->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('name', function ($row) {
                        $mname = '';
                        if($row->mname){
                            $mname .=substr($row->mname, 0, 1).'.';
                        }
                        $created = $row->lname.', '.$row->fname.' '.$mname;
                        return $created;
                    })
                    ->addColumn('created', function ($row) {
                        $time = $row->created_at;
                        $created = date('Y/m/d', strtotime($time));
                        return $created;
                    })
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

                        return $action;

                    })
                    ->rawColumns(['action','created','name'])
                    ->make(true);
            }

            return view('opd.virtual-consult.index', [
                // navigation
                'tree' => 'OPD',
                'branch' => 'Virtual Consultation',
                'twig' => 'Triage',
                'leaves' => '',

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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'lname' => 'required|max:255',
            'fname' => 'required|max:255',
            'age' => 'required|max:255',
            'birthday' => 'required|max:255',
            'sex' => 'required|max:255',
            'address' => 'required|max:255',
            'contactnum' => 'required|max:255',
            'oldnew' => 'required|max:255',
            'chiefcomplaint' => 'required|max:255',
        ]);

        $virtcon = new VirtualConsult();
        $virtcon->appointmentcode = 'CSMC-OPD'+ucwords($request->lname)+'O'+date("Y")+'P'+date("m")+'D'+date("d");
        $virtcon->lname = $request->lname;
        $virtcon->fname = $request->fname;
        $virtcon->mname = $request->mname;
        $virtcon->age = $request->age;
        $virtcon->birthday = $request->birthday;
        $virtcon->sex = $request->sex;
        $virtcon->address = $request->address;
        $virtcon->contactnum = $request->contactnum;
        $virtcon->oldnew = $request->oldnew;
        $virtcon->hospitalnumber = $request->hospitalnumber;
        $virtcon->chiefcomplaint = $request->chiefcomplaint;
        $virtcon->department = $request->department;
        $virtcon->rdepartment = $request->rdepartment;
        $virtcon->disposition = $request->disposition;
        $virtcon->status = $request->status;
        $virtcon->remarks = $request->remarks;
        $virtcon->link = $request->link;
        $virtcon->save();
    }

    public function show(VirtualConsult $virtualConsult)
    {
        return view('opd.virtual-consult.patient-profile', [
            // navigation
            'tree' => 'OPD',
            'branch' => 'Virtual Consultation',
            'twig' => 'Patient Profile',
            'leaves' => '',

            'ppatient' => $virtualConsult
        ]);
    }

    public function edit(VirtualConsult $virtualConsult)
    {
        return Response::json($virtualConsult);
    }

    public function update(Request $request, VirtualConsult $virtualConsult)
    {
        $request->validate([
            'lname' => 'required|max:255',
            'fname' => 'required|max:255',
            'age' => 'required|max:255',
            'birthday' => 'required|max:255',
            'sex' => 'required|max:255',
            'address' => 'required|max:255',
            'contactnum' => 'required|max:255',
            'oldnew' => 'required|max:255',
            'chiefcomplaint' => 'required|max:255',
        ]);

        $virtualConsult->lname = $request->lname;
        $virtualConsult->fname = $request->fname;
        $virtualConsult->mname = $request->mname;
        $virtualConsult->age = $request->age;
        $virtualConsult->birthday = $request->birthday;
        $virtualConsult->sex = $request->sex;
        $virtualConsult->address = $request->address;
        $virtualConsult->contactnum = $request->contactnum;
        $virtualConsult->oldnew = $request->oldnew;
        $virtualConsult->hospitalnumber = $request->hospitalnumber;
        $virtualConsult->chiefcomplaint = $request->chiefcomplaint;
        $virtualConsult->department = $request->department;
        $virtualConsult->rdepartment = $request->rdepartment;
        $virtualConsult->disposition = $request->disposition;
        $virtualConsult->status = $request->status;
        $virtualConsult->remarks = $request->remarks;
        $virtualConsult->link = $request->link;
        $virtualConsult->save();
    }

    public function destroy(VirtualConsult $virtualConsult)
    {
        return Response::json($virtualConsult);
    }

    public function opdvcreg ()
    {
        return view('opd-virtual-consultation-registration', [
            // navigation
            'tree' => 'OPD',
            'branch' => 'Virtual Consult Registration',
            'twig' => '',
            'leaves' => '',


        ]);
    }

    public function storeopdvcreg(Request $request)
    {
        $request->validate([
            'lname' => 'required|max:255',
            'fname' => 'required|max:255',
            'age' => 'required|max:255',
            'birthday' => 'required|max:255',
            'sex' => 'required|max:255',
            'address' => 'required|max:255',
            'contactnum' => 'required|max:255',
            'oldnew' => 'required|max:255',
            'chiefcomplaint' => 'required|max:255',
        ]);

        $virtcon = new VirtualConsult();
        $virtcon->appointmentcode = 'CSMC-'.ucwords($request->lname).'O'.date("Y").'P'.date("m").'D'.date("d").'O'.date("h").'V'.date("i").'C'.date("s");
        $virtcon->lname = $request->lname;
        $virtcon->fname = $request->fname;
        $virtcon->mname = $request->mname;
        $virtcon->age = $request->age;
        $virtcon->birthday = $request->birthday;
        $virtcon->sex = $request->sex;
        $virtcon->address = $request->address;
        $virtcon->contactnum = $request->contactnum;
        $virtcon->oldnew = $request->oldnew;
        $virtcon->chiefcomplaint = $request->chiefcomplaint;
        $virtcon->status = 'Pending';
        $virtcon->save();

        return redirect()->back();
    }

    public function mpssurgery(Request $request)
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
                $data = VirtualConsult::latest()->where('department','pending')->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('name', function ($row) {
                        $mname = '';
                        if($row->mname){
                            $mname .=substr($row->mname, 0, 1).'.';
                        }
                        $created = $row->lname.', '.$row->fname.' '.$mname;
                        return $created;
                    })
                    ->addColumn('created', function ($row) {
                        $created = $row->created_at;
                        return $created;
                    })
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

                        return $action;

                    })
                    ->rawColumns(['action','created','name'])
                    ->make(true);
            }

            return view('opd.virtual-consult.surgery', [
                // navigation
                'tree' => 'OPD',
                'branch' => 'Virtual Consultation',
                'twig' => 'Surgery',
                'leaves' => '',

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

    public function patientprofile(VirtualConsult $virtualConsult)
    {
        return view('opd.virtual-consult.patient-profile', [
            // navigation
            'tree' => 'OPD',
            'branch' => 'Virtual Consultation',
            'twig' => 'Patient Profile',
            'leaves' => '',

            'ppatient' => $virtualConsult
        ]);
    }
}
