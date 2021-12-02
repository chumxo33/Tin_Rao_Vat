<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\HomeArticleController;
use App\Http\Controllers\User\UserArticleController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\UserManageController;
use  App\Http\Middleware\BlockUserMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ArticleManagerController;
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

Route::get('/', [HomeController::class, 'index'])->name('homePage');
Route::get('/infor', [App\Http\Controllers\HomeController::class, 'infor'])->name('infor')->middleware(['auth']);
Route::get('/infor/get', [App\Http\Controllers\HomeController::class, 'getInfor'])->name('getInfor')->middleware(['auth']);

// Routes/web.php
Route::group([ 'prefix' => 'admin', 'middleware'=>['auth', 'role:Admin']], function(){
   Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('adminHome');
   //Hiện thị thông tin 
   Route::get('/users', [UserManageController::class, 'index'])->name('admin.manageUser');
    //BlockUser    
   Route::post('/users/block/{user}', [UserManageController::class, 'blockUser'])->name('admin.blockUser');
    // unblockUser    
   Route::post('/users/unblock/{user}', [UserManageController::class, 'unblockUser'])->name('admin.unblockUser');

});

Route::group([ 'prefix' => 'u       ser', 'middleware'=> ['auth', 'checkBlockUser', 'role:User', ]], function(){
    Route::resource('/article', UserArticleController::class)->name('*','userArticle');
});

// App\Http\Controllers\CategoryController
Route::get('resource/categories', [CategoryController::class, 'index'])->name('getCategoriesResource');


// use LoCationController
Route::get('/location/provinces', [LocationController::class, 'getProvinces'])->name('getProvinces');

// public function getDistricts(Request $request, Province $province)
Route::get('/location/province/{province}/districts', [LocationController::class, 'getDistricts'])->name('getDistricts');

// public function getWards(Request $request, District $district)
Route::get('/location/district/{district}/wards', [LocationController::class, 'getWards'])->name('getWards');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
