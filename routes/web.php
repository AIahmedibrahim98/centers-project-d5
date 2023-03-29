<?php

use App\Http\Controllers\CompanyController;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Maneger;
use Illuminate\Routing\Route as RoutingRoute;
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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

   Route::prefix('companies')->as('companies.')->group(function(){
    Route::get('/',[CompanyController::class,'index'])->name('index');
    Route::get('/create',[CompanyController::class,'create'])->name('create');
    Route::post('/store',[CompanyController::class,'store'])->name('store');
   });
});

