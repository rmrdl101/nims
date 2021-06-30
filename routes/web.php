<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Controllers
use App\Http\Controllers\Auth\RegisterCtrl;
use App\Http\Controllers\Auth\LoginCtrl;
use App\Http\Controllers\Dashboard\Admin\UserCtrl;
use App\Http\Controllers\Dashboard\Admin\PermissionCtrl;
use App\Http\Controllers\Dashboard\Admin\PageCtrl;
use App\Http\Controllers\Dashboard\Admin\PositionCtrl;
use App\Http\Controllers\Dashboard\Admin\DepartmentCtrl;
use App\Http\Controllers\Dashboard\Admin\AdminCtrl;
use App\Http\Controllers\Dashboard\DashCtrl;
use App\Http\Controllers\Dashboard\ProfileCtrl;
use App\Http\Controllers\DocumentManager\DocviewCtrl;
use App\Http\Controllers\Dashboard\ScheduleCtrl;
use App\Http\Controllers\Dashboard\CommonForms\NSO\InspectionAcceptanceReportController;
use App\Http\Controllers\Dashboard\AnnouncementCtrl;

//Accomplishment Report
use App\Http\Controllers\AccomplishmentReport\BedOccupancyCtrl;
use App\Http\Controllers\AccomplishmentReport\KPICtrl;
use App\Http\Controllers\AccomplishmentReport\ESRCtrl;

//OPD
use App\Http\Controllers\OPD\VirtualConsultCtrl;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('dashboard');
    } else {
        $announcement = \App\Models\Dashboard\Announcement::latest()->get();

        return view('index', [
            // navigation
            'tree' => 'Main',
            'branch' => 'Home',

            'announce' => $announcement
        ]);
    }
});

//Bed Occupancy
Route::get('opd-virtual-consultation-registration', [VirtualConsultCtrl::class, 'opdvcreg'])->name('opdreg');

// Authentication Routes...
Route::get('login', [LoginCtrl::class, 'index'])->name('login');
Route::post('login', [LoginCtrl::class, 'login']);
Route::get('logout', [LoginCtrl::class, 'logout'])->name('logout');

// Registration Routes...
Route::get('register', [RegisterCtrl::class, 'index'])->name('register');
Route::post('register', [RegisterCtrl::class, 'register']);


//Admin Routes
Route::middleware('position:admin')->group(function (){
    Route::get('dashboard/admin', [AdminCtrl::class, 'index']);
    Route::resource('dashboard/admin/users', UserCtrl::class)->name('index', 'user');
    Route::resource('dashboard/admin/permissions', PermissionCtrl::class)->name('index', 'permission');
    Route::resource('dashboard/admin/pages', PageCtrl::class)->name('index', 'page');
    Route::resource('dashboard/admin/positions', PositionCtrl::class)->name('index', 'position');
    Route::resource('dashboard/admin/departments', DepartmentCtrl::class)->name('index', 'department');
});

Route::get('dashboard/common-forms/nso/inspection-acceptance-report/iar-pdf', [InspectionAcceptanceReportController::class, 'pdf']);

//Regular User Routes
Route::middleware('position:admin,standard-user')->group(function (){
    Route::get('dashboard', [DashCtrl::class, 'index'])->name('dashboard');
    Route::resource('dashboard/announcement', AnnouncementCtrl::class)->name('index', 'announcement');
    Route::resource('profile', ProfileCtrl::class)->name('index', 'profile');

    Route::resource('document-manager', DocviewCtrl::class)->name('index', 'document-manager');
    Route::post('/store/path/',[DocviewCtrl::class,'storepath']);

    Route::resource('dashboard/schedules', ScheduleCtrl::class);
    Route::resource('dashboard/common-forms/nso/inspection-acceptance-report', InspectionAcceptanceReportController::class);


});

//Accomplishment Report
Route::middleware('position:admin,standard-user')->group(function (){

    //Bed Occupancy
    Route::get('bed-occupancy-overview', [BedOccupancyCtrl::class, 'overview']);
    //Route::resource('dashboard/en', BedOccupancyCtrl::class);
    Route::resource('accomplishment-reports/bed-occupancy', BedOccupancyCtrl::class);

    //KPI
    Route::resource('accomplishment-reports/key-performance-indicators', KPICtrl::class)->name('index', 'key-performance-indicators');
});

//OPD
Route::middleware('position:admin,standard-user')->group(function (){

    //Vir
//    Route::get('opd/virtual-consult/patient-profile',[VirtualConsultCtrl::class,'patientprofile'])->name('patient-profile');
    Route::get('opd/virtual-consult/surgery',[VirtualConsultCtrl::class,'mpssurgery'])->name('vc-surgery');
    Route::resource('opd/virtual-consult',VirtualConsultCtrl::class)->name('index', 'virutal-consult');

});

Route::post('opd-virtual-consultation-registration',[VirtualConsultCtrl::class,'storeopdvcreg'])->name('regpt');

Route::get('/file-tree',[DocviewCtrl::class,'fileTree'])->name('file-tree');
Route::post('/fdelete',[DocviewCtrl::class,'fdelete'])->name('file-delete');
Route::post('/upload',[DocviewCtrl::class,'upload'])->name('upload');
Route::post('/new-folder',[DocviewCtrl::class,'newFolder'])->name('new-folder');
Route::post('/delete-folder',[DocviewCtrl::class,'deleteFolder'])->name('delete-folder');








//Route::namespace('App\Http\Controllers')->group(function (){
//    Route::namespace('Auth')->group(function (){
//        // Authentication Routes...
////        Route::get('login', 'LoginCtrl@catchlogin')->name('login');
////        Route::post('login', 'LoginCtrl@login');
////        Route::get('logout', 'LoginCtrl@logout')->name('logout');
//
//        // Registration Routes...
//        Route::get('register', 'RegisterCtrl@index')->name('register');
//        Route::post('register', 'RegisterCtrl@register');
//
//
//        // Password Reset Routes...
//        //$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
//        //$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//        //$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
//        //$this->post('password/reset', 'Auth\ResetPasswordController@reset');
//    });
//
//    Route::namespace('Dashboard')->group(function (){
//        Route::namespace('Admin')->middleware('role:admin,manager')->group(function (){
//            Route::get('dashboard/admin', 'AdminCtrl@index');
//
//            Route::resource('dashboard/admin/users', 'UserCtrl');
//        });
//
//
//
//
//
//        Route::get('dashboard', 'DashCtrl@index')->middleware('role:admin,manager,standard-user');
//        Route::get('dashboard/profile', 'ProfileCtrl@index')->middleware('role:admin,manager,standard-user');
//    });
//});
