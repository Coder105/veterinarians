<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/dashboard');

Route::get('dashboard/', [DashboardController::class, 'show'])->name('dashboard');


Route::get('owners/', [OwnerController::class, 'show'])->name('owners');
 
Route::get('/owner/add', [OwnerController::class, 'add'])->name('owner.add');

Route::post('/owner/create', [OwnerController::class, 'create'])->name('owner.create');

Route::get('/owner/edit/{id}', [OwnerController::class, 'edit'])->name('owner.edit');

Route::post('/owner/save', [OwnerController::class, 'save'])->name('owner.save');

Route::get('/owner/delete/{id}', [OwnerController::class, 'delete'])->name('owner.delete');


Route::get('patients/', [PatientController::class, 'show'])->name('patients');

Route::get('/patient/add', [PatientController::class, 'add'])->name('patient.add');

Route::post('/patient/create', [PatientController::class, 'create'])->name('patient.create');

Route::get('/patient/edit/{id}', [PatientController::class, 'edit'])->name('patient.edit');

Route::post('/patient/save', [PatientController::class, 'save'])->name('patient.save');

Route::get('/patient/delete/{id}', [PatientController::class, 'delete'])->name('patient.delete');


require __DIR__.'/auth.php';
