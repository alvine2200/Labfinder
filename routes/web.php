<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Labownercontroller;
use App\Http\Controllers\LabDetailsController;
use App\Http\Controllers\Clientcontroller;
use App\Http\Controllers\HomeController;

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

Route::get('/',[HomeController::class,'home']);
Route::get('labs',[HomeController::class,'labs_page']);
Route::get('book_appointment/{id}',[HomeController::class,'booking']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('login_view',[LoginController::class,'index']);
Route::get('register_view',[RegistrationController::class,'index']);
Route::post('register_user',[RegistrationController::class,'register_user']);
Route::post('login_user',[LoginController::class,'login_user']);

Route::get('users',[UserController::class,'index']);
Route::any('make_labowner/{id}',[UserController::class,'make_labowner']);
Route::any('sign_out',[UserController::class,'logout']);

Route::get('lab_profile',[Labownercontroller::class,'index']);
Route::get('view_appointments',[Labownercontroller::class,'view_appointments']);
Route::post('create_lab_profile',[LabDetailsController::class,'store']);
Route::get('view_lab_details',[LabDetailsController::class,'show']);
Route::get('edit_lab_profile/{id}',[LabDetailsController::class,'edit']);
Route::any('delete_lab_profile/{id}',[LabDetailsController::class,'destroy']);
Route::post('update_lab_profile/{id}',[LabDetailsController::class,'update']);

Route::get('make_appointment',[AppointmentController::class,'index']);
Route::get('appointment_details/{id}',[AppointmentController::class,'appointment_show']);
Route::any('create_appointment/{id}',[AppointmentController::class,'create']);
Route::get('view_user_appointment',[AppointmentController::class,'edit']);
Route::get('cancel_appointment/{id}',[AppointmentController::class,'cancel']);
Route::post('search',[AppointmentController::class,'searchforlabortest']);
Route::any('approve_appointment/{id}',[AppointmentController::class,'approve']);
require __DIR__.'/auth.php';
