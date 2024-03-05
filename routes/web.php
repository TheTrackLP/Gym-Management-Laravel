<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\MemberController;
use App\Http\Controllers\Backend\BundleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
Route::middleware(['auth'])->group(function () {
    Route::controller(AdminController::class)->group(function() {
        Route::get('/admin/dashboard', 'Dashboard')->name('dashboard');
    });

    Route::controller(MemberController::class)->group(function(){
        Route::get('/admin/members', 'AllMembers')->name('all.members');
        Route::post('/admin/members/add', 'AddMember')->name('add.members');
        Route::get('/admins/members/edit/{id}', 'ViewMember')->name('view.members');
        Route::post('/admins/members/update', 'UpdateMember')->name('update.members');
        Route::get('/admin/members/delete/{id}', 'DeleteMember')->name('delete.members');
    });

    Route::controller(BundleController::class)->group(function(){
        Route::get('/admin/bundles', 'AllBundles')->name('all.bundles');

        //Plans
        Route::post('/admin/bundles/plans/add', 'AddPlan')->name('add.plans');
        //Packages
        Route::post('/admin/bundles/packages/add', 'AddPackage')->name('add.package');
    });
});



require __DIR__.'/auth.php';