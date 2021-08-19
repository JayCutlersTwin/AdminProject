<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;


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
    if (session()->has('LoggedUser')) {
        return view('welcome');
    } else {
        return redirect('login');
    }
});

Route::get('login', [LoginController::class, 'create']);
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy']);


Route::get('/index', [AdminController::class, 'index']);


Route::get('/employee/create', [EmployeeController::class, 'createEmployee']);
Route::post('/showCompany/1', [EmployeeController::class, 'storeEmployee'])->name('employee.create');
Route::get('/showEmployee/{id}', [EmployeeController::class, 'showEmployee']);
Route::get('/showEmployee/{id}/edit', [EmployeeController::class, 'editEmployee']);
Route::patch('/showEmployee/{id}', [EmployeeController::class, 'updateEmployee']);
Route::delete('/showEmployee/{id}', [EmployeeController::class, 'destroyEmployee']);


Route::get('/company/create', [AdminController::class, 'createCompany']);
Route::post('/index', [AdminController::class, 'storeCompany']);
Route::get('/showCompany/{id}', [AdminController::class, 'showCompany']);
Route::get('/showCompany/{id}/edit', [AdminController::class, 'editCompany']);
Route::patch('/showCompany/{id}', [AdminController::class, 'updateCompany']);
Route::delete('/showCompany/{id}', [AdminController::class, 'destroyCompany']);
