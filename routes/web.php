<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VendorController;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Maneger;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\App;
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
Route::middleware(['auth'])->group(function () {
    Route::get('/greeting/{locale}', function ($locale) {
        if (!in_array($locale, ['en', 'ar'])) {
            abort(400);
        }
        session()->put("locale", $locale);
        // App::setLocale($locale);
        return redirect()->back();
    })->name('greeting');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Route::middleware('age')->prefix('companies')->as('companies.')->group(function () {
    Route::prefix('companies')->as('companies.')->group(function () {
        Route::get('/', [CompanyController::class, 'index'])->name('index');
        // Route::get('/create', [CompanyController::class, 'create'])->name('create')->middleware('age');
        Route::get('/create', [CompanyController::class, 'create'])->name('create');
        Route::post('/store', [CompanyController::class, 'store'])->name('store');
        Route::delete('delete/{id}', [CompanyController::class, 'delete'])->name('delete');
        Route::get('/edit/{id}', [CompanyController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [CompanyController::class, 'update'])->name('update');
        Route::prefix('branches')->as('branches.')->group(function () {
            Route::get('/{company_id}', [BranchController::class, 'index'])->name('index');
            Route::get('/{company_id}/create', [BranchController::class, 'create'])->name('create');
            Route::post('/store/{company_id}/', [BranchController::class, 'store'])->name('store');
        });
    });
    // Route::resource('vendors',VendorController::class)->except(['create']);
    // Route::resource('vendors', VendorController::class)->only(['index']);
    Route::resource('vendors', VendorController::class);
});
