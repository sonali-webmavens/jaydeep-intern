<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\NewCompanyController;
use App\Mail\MyTestEmail;

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

Route::get('/employee-register', function () {
    return view('employee-register');
});

Route::view('employee-list', 'employee-list');

$routes = [
    "media" => App\Http\Controllers\MediaController::class,
    "company" => App\Http\Controllers\CompanyController::class,
    "userprofile" => App\Http\Controllers\UserProfileController::class,
   
];

foreach ($routes as $key => $controllerName) {
    Route::get('/' . $key . '-create', [$controllerName, 'create'])->name($key . '.create');
    Route::post('/' . $key, [$controllerName, 'save'])->name($key . '.save');
    Route::get('/' . $key, [$controllerName, 'lists'])->name($key.'.lists');
    Route::get('/' . $key . '/edit/{id}', [$controllerName, 'edit'])->name($key . '.edit');
    Route::post('/' . $key . '/{id}', [$controllerName, 'update'])->name($key . '.update');
    Route::get('/' . $key . '/delete/{id}', [$controllerName, 'delete'])->name($key . '.delete');
}

Route::get('/newcompany', [NewCompanyController::class,'show'])->name('show');
Route::get('/export', [NewCompanyController::class,'export'])->name('export');
