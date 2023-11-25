<?php

use App\Http\Controllers\Admin\Admins\AdminsController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Home\HomeController;
use App\Http\Controllers\Admin\Packages\PackagesController;
use App\Http\Controllers\Admin\Requests\RequestsController;
use App\Http\Controllers\Admin\Roles\RolesController;
use Illuminate\Support\Facades\Route;
Route::group([
    "namespace"=>"Admin",
    'prefix' => '/admin',
    'as' => 'admin.',
    'middleware'=> 'admin'
  ], function () {
    // Route::get('/', function () {
    //     return view('layout.admin');
    // });
    //auth
    Route::get('/login',[LoginController::class, 'show_login_view'])->name('admin.show_login');
    Route::post('login',[LoginController::class, 'login'])->name('admin.login');
  
      //home
      Route::group(['prefix' => '/home',
      'as' => 'home.',],function ()  {
        Route::get('/',[HomeController::class, 'index'])->name('home');
      });
      

       //admins
       Route::group(['prefix' => '/admins',
       'as' => 'admins.',],function ()  {
         Route::get('/',[AdminsController::class, 'index'])->name('admins_index');
       });

       //packages
       Route::group(['prefix' => '/packages',
       'as' => 'packages.',],function ()  {
         Route::get('/',[PackagesController::class, 'index'])->name('packages_index');
       });

       //requests
       Route::group(['prefix' => '/requests',
       'as' => 'requests.',],function ()  {
         Route::get('/',[RequestsController::class, 'index'])->name('requests_index');
       });

       //roles
       Route::group(['prefix' => '/roles',
       'as' => 'roles.',],function ()  {
         Route::get('/',[RolesController::class, 'index'])->name('roles_index');
       });
  });


