<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Backend\MembersController;
use App\Http\Controllers\Backend\ActiveController;
use App\Http\Controllers\Backend\PlansController;
use App\Http\Controllers\Backend\TrainerController;
use App\Http\Controllers\Backend\PackageController;
use App\Http\Controllers\Backend\ExerciseController;

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
    return view('auth.login');
});

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/
Route::middleware(['auth'])->group(function (){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    
    Route::controller(MembersController::class)->group(function (){
        Route::get('/admin/members', 'Members')->name('all.members');
        Route::post('/admin/add', 'AddMembers')->name('add.member');
        Route::get('/admin/members/edit/{id}', 'EditMembers')->name('edit.members');
        Route::post('/admin/member/update', 'UpdateMember')->name('update.members');
    });

    Route::controller(ActiveController::class)->group(function (){
        Route::get('/admin/actives', 'Actives')->name('all.actives');
        Route::post('/admin/actives', 'AddActives')->name('add.actives');
        Route::get('/admin/actives/view/{id}', 'ViewActives')->name('view.actives');
    });

    Route::controller(PlansController::class)->group(function (){
        Route::get('/admin/plans', 'Plans')->name('all.plans');
        Route::post('/plans/add', 'AddPlan')->name('add.plans');
    });

    Route::controller(TrainerController::class)->group(function (){
        Route::get('/admin/trainers', 'Trainers')->name('all.trainers');
        Route::post('/admin/trainers/add', 'AddTrainers')->name('add.trainers');
    });

    Route::controller(PackageController::class)->group(function (){
        Route::get('/admin/packages', 'Packages')->name('all.packages');
        Route::post('/admin/packages/add', 'AddPackages')->name('add.packages');
        Route::get('/admin/packages/delete/{id}', 'DeletePackages')->name('delete.package');
    });

    Route::controller(ExerciseController::class)->group(function (){
        Route::get('/admin/exercises', 'Exercises')->name('all.exercise');
        Route::post('/admin/exercise/add', 'AddExercise')->name('add.exercise');
        Route::get('/admin/exercise/edit/{id}', 'EditExercise')->name('edit.exercise');
    });
});

require __DIR__.'/auth.php';