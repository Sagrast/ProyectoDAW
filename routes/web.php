<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\clienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NodoController;
use App\Http\Controllers\vehicleController;
use App\Http\Controllers\machineController;
use App\Http\Controllers\productController;
use App\Http\Middleware\localeMiddleware;


//A traves de un middleware gestionamos el idioma de la aplicación. Asignando el idioma
//Al grupo de rutas que contiene la funcion.
Route::middleware(localeMiddleware::class)->group(function () {



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


    Route::get('/location', function () {
        return view('/web/location');
    });

    Route::get('/contact', [NodoController::class, 'contact'])->name('web.nodos.contact');
    Route::post('/contact', [NodoController::class, 'correo'])->name('web.nodos.mail');


    route::get(
        '/services',
        function () {
            return view('/web/services');
        }
    );

    /*
|--------------------------------------------------------------------------
| Nodos
|--------------------------------------------------------------------------
*/

    //Indice de noticias
    Route::get('/news', [NodoController::class, 'news'])->name('web.nodos.news');

    //Ver noticia por ID
    Route::get('/article/{post}', [NodoController::class, 'show'])->name('web.nodos.show');

    //Ver lista de etiquetas relacionadas
    Route::get('/labels/{label}', [NodoController::class, 'labels'])->name('web.nodos.labels');

    //Crear nueva noticia
    Route::get('/create', [NodoController::class, 'create'])->name('web.nodos.create');
    Route::post('/create', [NodoController::class, 'store'])->name('web.nodos.store');

    //editar Noticia
    Route::get('/editArticle/{id}', [NodoController::class, 'edit'])->middleware('edit')->name('web.nodos.edit');
    Route::Post('/updateArticle/{id}', [NodoController::class, 'update'])->middleware('edit')->name('web.nodos.update');

    //Eliminar noticia.
    Route::get('destroyArticle/{id}', [NodoController::class, 'destroy'])->middleware('edit')->name('web.nodos.destroy');

    /*
|--------------------------------------------------------------------------
| Administrción.
|--------------------------------------------------------------------------
*/

    //Index
    Route::get('/users', [adminController::class, 'index'])->middleware('admin')->name('admin.users.index');
    Route::post('/users', [adminController::class, 'filter'])->middleware('admin')->name('admin.users.index');
    //Borrar
    Route::get('/destroyUser/{id}', [adminController::class, 'destroy'])->middleware('admin')->name('admin.users.destroy');
    //actualizar usuarios
    Route::get('/update/{id}', [adminController::class, 'edit'])->middleware('admin')->name('admin.users.edit');
    Route::Post('/update/{id}', [adminController::class, 'update'])->middleware('admin')->name('admin.users.update');
    //Detalles de los usuarios
    Route::get('/infoUser/{id}', [adminController::class, 'show'])->middleware('admin')->name('admin.users.show');
    //Control de Noticias.
    Route::get('/allNews', [NodoController::class, 'list'])->middleware('edit')->name('web.admin.list');
    Route::post('/allNews', [NodoController::class, 'filter'])->middleware('edit')->name('web.admin.filter');

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('/web/dashboard');
    })->name('dashboard');


    /*
|--------------------------------------------------------------------------
| Vehiculos
|--------------------------------------------------------------------------
*/

    //Listado vehiculos
    Route::get('/vehicles', [vehicleController::class, 'index'])->middleware('gestor')->name('web.vehicles.index');
    Route::post('/vehicles', [vehicleController::class, 'filter'])->middleware('gestor')->name('web.vehicles.filter');
    //borrar vehiculos
    Route::get('/destroyCar/{id}', [vehicleController::class, 'destroy'])->middleware('gestor')->name('web.vehicles.destroy');
    //gestionar Vehiculos
    Route::get('/infoVehicle/{id}', [vehicleController::class, 'show'])->middleware('gestor')->name('web.vehicles.show');
    Route::post('/infoVehicle', [vehicleController::class, 'store'])->middleware('gestor')->name('web.vehicles.store');
    //Nuevo Vehiculo
    Route::get('/addVehicle', [vehicleController::class, 'create'])->middleware('gestor')->name('web.vehicles.create');
    Route::post('/addVehicle', [vehicleController::class, 'add'])->middleware('gestor')->name('web.vehicles.add');
    //Editar Vehiculos
    Route::get('/editVehicle/{id}', [vehicleController::class, 'edit'])->middleware('gestor')->name('web.vehicles.edit');
    Route::post('/editVehicle/{id}', [vehicleController::class, 'update'])->middleware('gestor')->name('web.vehicles.update');

    /*
|--------------------------------------------------------------------------
| Clientes
|--------------------------------------------------------------------------
*/
    //Listado de Clientes
    Route::get('/clients', [clienteController::class, 'index'])->middleware('gestor')->name('web.clientes.index');
    Route::post('/clients', [clienteController::class, 'filter'])->middleware('gestor')->name('web.clientes.filter');
    //Borrar Clientes
    Route::get('/destroyClient/{id}', [clienteController::class, 'destroy'])->middleware('gestor')->name('web.clientes.destroy');
    //Editar Clientes
    Route::get('/editClient/{id}', [clienteController::class, 'edit'])->middleware('gestor')->name('web.clientes.edit');
    Route::post('/editClient/{id}', [clienteController::class, 'update'])->middleware('gestor')->name('web.clientes.update');
    //Gestion de Clientes
    Route::get('/infoClient/{id}', [clienteController::class, 'show'])->middleware('gestor')->name('web.clientes.show');
    Route::post('/infoClient', [clienteController::class, 'store'])->middleware('gestor')->name('web.clientes.store');

    //Nuevo cliente
    Route::get('/addClient', [clienteController::class, 'create'])->middleware('gestor')->name('web.clientes.create');
    Route::post('/addClient', [clienteController::class, 'add'])->middleware('gestor')->name('web.clientes.add');
    /*
|--------------------------------------------------------------------------
| Maquinas
|--------------------------------------------------------------------------
*/
    //Listado de Máquinas
    Route::get('/machines', [machineController::class, 'index'])->middleware('gestor')->name('web.machines.index');
    Route::post('/machines', [machineController::class, 'filter'])->middleware('gestor')->name('web.machines.filter');
    //Borrar Maquinas
    Route::get('/destroyMachine/{id}', [machineController::class, 'destroy'])->middleware('gestor')->name('web.machines.destroy');
    //Editar Maquinas
    Route::get('/editMachine/{id}', [machineController::class, 'edit'])->middleware('gestor')->name('web.machines.edit');
    Route::post('/editMachine/{id}', [machineController::class, 'update'])->middleware('gestor')->name('web.machines.update');
    //Gestion Máquinas
    Route::get('/infoMachine/{id}', [machineController::class, 'show'])->middleware('gestor')->name('web.machines.show');
    Route::post('/infoMachine', [machineController::class, 'store'])->middleware('gestor')->name('web.machines.store');
    Route::get('/withdraw/{id}/{cliente}', [machineController::class, 'withdraw'])->middleware('gestor')->name('web.machines.withdraw');
    Route::get('/install/{id}/{cliente}', [machineController::class, 'install'])->middleware('gestor')->name('web.machines.install');
    //Nueva Máquina
    Route::get('/addMachine', [machineController::class, 'create'])->middleware('gestor')->name('web.machines.create');
    Route::post('/addMachine', [machineController::class, 'add'])->middleware('gestor')->name('web.machines.add');
    //Cerrar incidencias
    Route::get('/failure/{id}', [machineController::class, 'close'])->middleware('gestor')->name('web.machines.close');
    //Averías
    Route::get('/failure',[machineController::class,'failures'])->middleware('gestor')->name('web.machines.failures');



    /*
|--------------------------------------------------------------------------
| Productos
|--------------------------------------------------------------------------
*/
    //Listado de Productos
    Route::get('/products', [productController::class, 'index'])->middleware('gestor')->name('web.products.index');
    Route::post('/products', [productController::class, 'filter'])->middleware('gestor')->name('web.products.filter');
    //Borrar Productos
    Route::get('/destroyProduct/{id}', [productController::class, 'destroy'])->middleware('gestor')->name('web.products.destroy');
    //Editar Productos
    Route::get('/editProduct/{id}', [productController::class, 'edit'])->middleware('gestor')->name('web.products.edit');
    Route::post('/editProduct/{id}', [productController::class, 'update'])->middleware('gestor')->name('web.products.update');
    //Gestion Productos
    Route::get('/infoProduct/{id}', [productController::class, 'show'])->middleware('gestor')->name('web.products.show');
    //Nueva Productos
    Route::get('/addProduct', [productController::class, 'create'])->middleware('gestor')->name('web.products.create');
    Route::post('/addProduct', [productController::class, 'add'])->middleware('gestor')->name('web.products.add');

    /*
|--------------------------------------------------------------------------
| Cargas, incidencias y otras cosas.
|--------------------------------------------------------------------------
*/

    Route::get('/cargas/{id}', [productController::class, 'show'])->middleware('gestor')->name('web.products.show');
    Route::post('/cargas', [productController::class, 'store'])->middleware('gestor')->name('web.products.store');
    //Historico de Cargas y filtro
    Route::get('/history/{id}', [productController::class, 'history'])->middleware('gestor')->name('web.products.history');
    Route::post('/history', [productController::class, 'filterLoadDate'])->middleware('gestor')->name('web.products.filterLoadDate');
});
/*
|--------------------------------------------------------------------------
| Idiomas
|--------------------------------------------------------------------------
*/

//Para seleccionar el idioma lo haremos a través de Cookies, creando una llamada Locale que contendrá el idioma seleccionado.
Route::get('/locale/{locale}', function ($locale) {
    return redirect()->back()->withCookie('locale', $locale);
});
