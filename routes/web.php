<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NodoController;

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
    return view('/welcome');
});


Route::get('/location', function(){
    return view('/web/location');
});

Route::get('/contact', function(){
    return view('/web/contact');
});

route::get('/services', function(){
    return view('/web/services');
}
);

/*
|--------------------------------------------------------------------------
| Nodos
|--------------------------------------------------------------------------
*/

Route::get('/news',[NodoController::class,'news'])->name('web.nodos.news');

Route::get('/article/{post}',[NodoController::class,'show'])->name('web.nodos.show');

Route::get('/labels/{label}',[NodoController::class,'labels'])->name('web.nodos.labels');

Route::get('/create',[NodoController::class,'create'])->name('web.nodos.create');
Route::post('/create',[NodoController::class,'store'])->name('web.nodos.store');


/*
|--------------------------------------------------------------------------
| Administrción.
|--------------------------------------------------------------------------
*/

//Index
Route::get('users',[adminController::class,'index'])->middleware('admin')->name('admin.users.index');
//Borrar
Route::get('destroy/{id}',[adminController::class,'destroy'])->middleware('admin')->name('admin.users.destroy');
//actualizar
Route::get('update/{id}',[adminController::class,'edit'])->middleware('admin')->name('admin.users.edit');
Route::Post('update/{id}',[adminController::class,'update'])->middleware('admin')->name('admin.users.update');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('/web/dashboard');
})->name('dashboard');
