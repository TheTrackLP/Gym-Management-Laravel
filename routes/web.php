<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\MemberController;
use App\Http\Controllers\Backend\BundleController;
use App\Http\Controllers\Backend\TrainerController;
use App\Http\Controllers\Backend\EquipmentController;
use App\Http\Controllers\Backend\ExerciseController;
use App\Http\Controllers\Backend\SplitController;

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
        //Bundles
        Route::get('/admin/bundles', 'AllBundles')->name('all.bundles');

        //Plans
        Route::post('/admin/bundles/plans/add', 'AddPlan')->name('add.plans');
        //Packages
        Route::post('/admin/bundles/packages/add', 'AddPackage')->name('add.package');
    });

    Route::controller(TrainerController::class)->group(function(){
        Route::get('/admin/trainers', 'AllTrainers')->name('all.trainers');
        Route::post('/admin/trainers/add', 'AddTrainers')->name('add.trainers');
        Route::get('/admin/trainers/delete/{id}', 'DeleteTrainers')->name('delete.trainers');
    });

    Route::controller(EquipmentController::class)->group(function(){
        Route::get('/admin/equipments', 'AllEquipments')->name('all.equip');
        Route::post('/admin/equipments/add', 'AddEquipment')->name('add.equip');
        Route::get('/admin/equipments/edit/{id}', 'EditEquipment')->name('edit.equip');
        Route::post('/admin/equipment/update', 'UpdateEquipment')->name('update.equip');
        Route::get('/admin/equipment/delete/{id}', 'DeleteEquip')->name('delete.equip');
    });

    Route::controller(ExerciseController::class)->group(function(){
        Route::get('/admin/exercises', 'AllExercises')->name('all.exercise');
        Route::post('/admin/exercises/add', 'AddExercise')->name('add.exer');
        Route::get('/admin/exercises/view/{id}', 'EditExer')->name('edit.exer');
        Route::get('/admin/exercises/delete/{id}', 'DeleteExer')->name('del.exer');
    });

    Route::controller(SplitController::class)->group(function(){
        Route::get('/admin/splits', 'AllSplit')->name('all.split');
        Route::get('/admin/splits/add', 'AddSplit')->name('add.split');
        Route::post('/admin/splits/store', 'StoreSplit')->name('store.split');
    });
});



require __DIR__.'/auth.php';