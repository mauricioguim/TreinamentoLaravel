<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostAdmController;
use App\Http\Controllers\PostsController;

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

Route::get('/', [PostsController::class, 'index'])->name('home');

Route::get('/auth', function(){
    
    if(Auth::attempt(
        [
            'email'=>'gildovigoroutlook.com',
            'password'=>123456
        ])){
            return "oi";
        }

        return "falhou";

    
});

Route::get('/auth/logout', function(){
    Auth::logout();
});


Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){

    Route::group(['prefix'=>'posts'], function(){


        Route::get('', [PostAdmController::class, 'index'])->name('admin.posts.index');
        Route::get('create', [PostAdmController::class, 'create'])->name('admin.posts.create');
        Route::post('store', [PostAdmController::class, 'store'])->name('admin.posts.store');
        Route::get('edit/{id}', [PostAdmController::class, 'edit'])->name('admin.posts.edit');
        Route::put('update/{id}', [PostAdmController::class, 'update'])->name('admin.posts.update');
        Route::get('destroy/{id}', [PostAdmController::class, 'destroy'])->name('admin.posts.destroy');
    });
});
