<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SmsController;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/',[HomeController::class,'index']);


Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified');
Route::get('/about',[HomeController::class,'about']);
Route::get('/send-feedback',[HomeController::class,'contact']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/add_doctor_view',[AdminController::class,'addview']);

Route::get('/add_user_view',[AdminController::class,'adduserView']);

Route::get('/add_patients_view',[AdminController::class,'addpatientsView']);

Route::post('/upload_doctor',[AdminController::class,'upload']);

Route::post('/upload_user',[AdminController::class,'uploadUser']);

Route::post('/appointment',[HomeController::class,'appointment']);

Route::post('/appointment/admin/{id}',[AdminController::class,'addAppointment']);

Route::post('/contact',[HomeController::class,'feedback']);

Route::get('/myappointment',[HomeController::class,'myappointment']);

Route::get('/cancel_appoint/{id}',[HomeController::class,'cancel_appoint']);

Route::get('/showappointment',[AdminController::class,'showappointment']);

Route::post('/approved/{id}',[AdminController::class,'approved']);

Route::post('/walkin/patients',[AdminController::class,'walkinPatient']);

Route::get('/verified/{id}',[AdminController::class,'directVerified']);

Route::post('/canceled/{id}',[AdminController::class,'canceled']);

Route::get('/showdoctor',[AdminController::class,'showdoctor']);

Route::get('/users',[AdminController::class,'allUsers']);

Route::delete('/deletedoctor/{id}',[AdminController::class,'deletedoctor']);

Route::get('/updatedoctor/{id}',[AdminController::class,'updatedoctor']);

Route::get('/feedbacks',[AdminController::class,'feedback']);

Route::put('/editdoctor/{id}',[AdminController::class,'editdoctor']);

Route::get('/emailview/{id}',[AdminController::class,'emailview']);

Route::post('/sendmail/{id}',[AdminController::class,'sendemail']);

Route::get('/updateuser/{id}',[AdminController::class,'updateuser']);

Route::put('/edituser/{id}',[AdminController::class,'edituser']);

Route::delete('/deleteuser/{id}',[AdminController::class,'deleteuser']);

Route::get('/patients-details/{id}',[AdminController::class,'patientsDetails']);

Route::get('/add-medical-history/{id}',[AdminController::class,'addMedical']);

Route::post('/add-medical-history',[AdminController::class,'addedMedical']);

Route::get('/print-details/{id}',[AdminController::class,'print']);

Route::delete('/delete-medical-history/{id}', [AdminController::class, 'deleteMedicalHistory']);

Route::get('/sms/{id}',[SmsController::class,'index']);
Route::get('/testimonies',[HomeController::class,'testimony']);
Route::post('/testimonies-add',[HomeController::class,'addTestimony']);
Route::put('/testimonies-edit/{id}',[HomeController::class,'updateTest']);
Route::delete('/testimonies-delete/{id}',[HomeController::class,'testDelete']);
