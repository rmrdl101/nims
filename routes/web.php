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
use App\Http\Controllers\Dashboard\Admin\RoleCtrl;
use App\Http\Controllers\Dashboard\Admin\AdminCtrl;
use App\Http\Controllers\Dashboard\DashCtrl;
use App\Http\Controllers\Dashboard\ProfileCtrl;
use App\Http\Controllers\Dashboard\ScheduleCtrl;
use App\Http\Controllers\Dashboard\KPICtrl;
use App\Http\Controllers\Dashboard\BedOccupancyCtrl;

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
        return view('index', [
            // navigation
            'tree' => 'Main',
            'branch' => 'Home'
        ]);
    }
});

// Authentication Routes...
Route::get('login', [LoginCtrl::class, 'index'])->name('login');
Route::post('login', [LoginCtrl::class, 'login']);
Route::get('logout', [LoginCtrl::class, 'logout'])->name('logout');

// Registration Routes...
Route::get('register', [RegisterCtrl::class, 'index'])->name('register');
Route::post('register', [RegisterCtrl::class, 'register']);


//Admin Routes
Route::middleware('position:admin,chief-nurse')->group(function (){
    Route::get('dashboard/admin', [AdminCtrl::class, 'index']);
    Route::resource('dashboard/admin/users', UserCtrl::class);
    Route::resource('dashboard/admin/departments', DepartmentCtrl::class);
    Route::resource('dashboard/admin/positions', PositionCtrl::class);
    Route::resource('dashboard/admin/pages', PageCtrl::class);
    Route::resource('dashboard/admin/permissions', PermissionCtrl::class);
    Route::resource('dashboard/admin/roles-and-permissions', RoleCtrl::class);
});

//Regular User Routes
Route::middleware('position:admin,standard-user')->group(function (){
    Route::get('dashboard', [DashCtrl::class, 'index']);
    Route::resource('dashboard/profile', ProfileCtrl::class);
    Route::resource('dashboard/schedules', ScheduleCtrl::class);
    Route::resource('dashboard/key-performance-indicators', KPICtrl::class);
    Route::resource('dashboard/bed-occupancy', BedOccupancyCtrl::class);
});

Route::get('bed-occupancy-overview', [BedOccupancyCtrl::class, 'overview']);

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
