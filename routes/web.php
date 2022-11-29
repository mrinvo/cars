<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\AdController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\CleaningController;
use App\Http\Controllers\dashboard\ProductController;
use App\Http\Controllers\dashboard\HomeController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\dashboard\ClerkController;
use App\Http\Controllers\dashboard\BrandController;


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
    return redirect()->route('dashboard');
})->middleware('admin');

Route::get('login', [AuthenticatedSessionController::class, 'create'])
->name('login');



  Route::get('/dashboard/home', [HomeController::class,'home'])->middleware(['admin'])->name('dashboard');



Route::prefix('/dashboard')->name('admin.')->group(function (){


    Route::middleware('admin')->group(function () {

        Route::get('/logout',[AdController::class,'destroy'])->name('logout');
        Route::get('/profile',[AdController::class,'profile'])->name('profile');
        Route::get('/edit-profile',[AdController::class,'edit_profile'])->name('profile.edit');
        Route::post('/update-profile',[AdController::class,'update_profile'])->name('profile.update');
        Route::get('/change-password',[AdController::class,'change_password'])->name('password.change');
        Route::post('/update-password',[AdController::class,'update_password'])->name('password.update');
        Route::get('delete/{id}',[AdController::class,'delete'])->name('delete');
        Route::get('/adduser',[AdController::class,'adduser'])->name('adduser');
        Route::post('/storeuser',[AdController::class,'storeuser'])->name('storeuser');
        Route::get('/edituser/{id}',[AdController::class,'edituser'])->name('edituser');
        Route::post('updateuser',[AdController::class,'updateuser'])->name('updateuser');



        //brands routes

        Route::get('/brand/index',[BrandController::class,'index'])->name('brand.index');
        Route::get('/brand/create',[BrandController::class,'create'])->name('brand.create');
        Route::post('/brand/store',[BrandController::class,'store'])->name('brand.store');
        Route::get('/brand/edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
        Route::post('/brand/update',[BrandController::class,'update'])->name('brand.update');
        Route::get('/brand/delete/{id}',[BrandController::class,'delete'])->name('brand.delete');

        //end brands routes










    });
    require __DIR__.'/admin_auth.php';

});



//  require __DIR__.'/auth.php';
