<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NodoController;
use App\Http\Controllers\vehicleController;

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

//Indice de noticias
Route::get('/news',[NodoController::class,'news'])->name('web.nodos.news');

//Ver noticia por ID
Route::get('/article/{post}',[NodoController::class,'show'])->name('web.nodos.show');

//Ver lista de etiquetas relacionadas
Route::get('/labels/{label}',[NodoController::class,'labels'])->name('web.nodos.labels');

//Crear nueva noticia
Route::get('/create',[NodoController::class,'create'])->name('web.nodos.create');
Route::post('/create',[NodoController::class,'store'])->name('web.nodos.store');

//editar Noticia
Route::get('/editArticle/{id}',[NodoController::class,'edit'])->middleware('edit')->name('web.nodos.edit');
Route::Post('/updateArticle/{id}',[NodoController::class,'update'])->middleware('edit')->name('web.nodos.update');

//Eliminar noticia.
Route::get('destroyArticle/{id}',[NodoController::class,'destroy'])->middleware('edit')->name('web.nodos.destroy');

/*
|--------------------------------------------------------------------------
| Administrción.
|--------------------------------------------------------------------------
*/

//Index
Route::get('/users',[adminController::class,'index'])->middleware('admin')->name('admin.users.index');
Route::post('/users',[adminController::class,'filter'])->middleware('admin')->name('admin.users.index');
//Borrar
Route::get('/destroy/{id}',[adminController::class,'destroy'])->middleware('admin')->name('admin.users.destroy');
//actualizar usuarios
Route::get('/update/{id}',[adminController::class,'edit'])->middleware('admin')->name('admin.users.edit');
Route::Post('/update/{id}',[adminController::class,'update'])->middleware('admin')->name('admin.users.update');

//Control de Noticias.
Route::get('/allNews',[NodoController::class,'list'])->middleware('edit')->name('web.admin.list');
Route::post('/allNews',[NodoController::class,'filter'])->middleware('edit')->name('web.admin.filter');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('/web/dashboard');
})->name('dashboard');


/*
|--------------------------------------------------------------------------
| Vehiculos
|--------------------------------------------------------------------------
*/

//vehiculos
Route::get('/vehicles',[vehicleController::class,'index'])->middleware('gestor')->name('web.vehicles.index');
Route::post('/vehicles',[vehicleController::class,'filter'])->middleware('gestor')->name('web.vehicles.filter');
//borrar vehiculos
Route::get('/destroy/{id}',[vehicleController::class,'destroy'])->middleware('gestor')->name('web.vehicles.destroy');
//gestionar Vehiculos
Route::get('/infoVehicle/{id}',[vehicleController::class,'show'])->middleware('gestor')->name('web.vehicles.show');
Route::post('/infoVehicle',[vehicleController::class,'store'])->middleware('gestor')->name('web.vehicles.store');
//Nuevo Vehiculo
Route::get('/addVehicle',[vehicleController::class,'create'])->middleware('gestor')->name('web.vehicles.create');
Route::post('/addVehicle',[vehicleController::class,'add'])->middleware('gestor')->name('web.vehicles.add');
//Editar Vehiculos
Route::get('/editVehicle/{id}',[vehicleController::class,'edit'])->middleware('gestor')->name('web.vehicles.edit');
Route::post('/editVehicle/{id}',[vehicleController::class,'update'])->middleware('gestor')->name('web.vehicles.update');
