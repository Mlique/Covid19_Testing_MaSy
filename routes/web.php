<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\ProfileController;



Route::get('/', function () {
    return view('main_index');
});
Route::get('/home', 'HomeController@index');

Route::get('/index', [UserController::class, 'index'])->name('auth');

Route::post('/register', [UserController::class, 'saveUser'])->name('auth.register');
Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile');
Route::patch('/account/{id}', [UserController::class, 'update'])->name('user.edit_saves');

Route::resource('/dependents', 'DependentController');

Route::resource('/testRequests', 'TestRequestController');

Route::resource('/medical_aids', 'MedicalAidController');
Route::resource('/favourite_suburb', 'FavouriteController');
Route::resource('/nurse', 'NurseController');
Route::resource('/schedular', 'TestBookingController');

Route::resource('/admins', 'AdminController');
Route::resource('/nurse_suburb', 'SuburbController');
Route::resource('/captures', 'TestResultController');

Route::post('schedule_log/records', 'AdminController@records')->name('schedule_log/records');






// Route::get('/dependent', [DependentController::class, 'index'])->name('dependents.index');
// Route::get('/create', [DependentController::class, 'create'])->name('dependents.create');
// Route::get('/dependent', [DependentController::class, 'edit'])->name('dependents.edit');
// Route::get('/dependent', [DependentController::class, 'update'])->name('dependents.index');
// Route::get('/dependent', [DependentController::class, 'destroy'])->name('dependents.index');




