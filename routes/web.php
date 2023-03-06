<?php

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [RestauranteController::class, 'indexAdmin'])->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware(['auth', 'rol:admin'])->group(function () {
    //Rutas protegidas para admin
    //restaurante
    Route::get('/admin/restaurantes', [RestauranteController::class, 'indexAdmin']);
    Route::get('/admin/restaurante/add', [RestauranteController::class, 'create']);
    Route::post('/admin/restaurante/store', [RestauranteController::class, 'store']);
    Route::get('/admin/restaurante/{restaurante}/modificar', [RestauranteController::class, 'modificar']);
    Route::get('/admin/restaurante/{restaurante}/eliminar', [RestauranteController::class, 'destroy']);

    //platos
    Route::get('/admin/platos/{restaurante}', [RestauranteController::class, 'platosAdmin']);
    Route::get('/admin/plato/add/{restaurante}', [PlatoController::class, 'create']);
    Route::post('/admin/plato/store/{restaurante}', [PlatoController::class, 'store']);
    Route::get('/admin/platos/{plato}/eliminar', [PlatoController::class, 'destroy']);

    //clientes
    Route::get('/admin/clientes', [UserController::class, 'index']);
    Route::get('/admin/cliente/{cliente}/eliminar', [UserController::class, 'destroy']);

    //repartidores
    Route::get('/admin/repartidores', [ProfileController::class, 'repartidores']);
    Route::get('/admin/repartidor/add', [UserController::class, 'create']);
    Route::post('/admin/repartidor/create', [UserController::class, 'store']);

    //pedidos
    Route::get('/admin/pedidos', [PedidoController::class, 'indexAdmin']);
    Route::post('/admin/pedido/{pedido}/modificar', [PedidoController::class, 'update']);

});

// Route::middleware(['auth', 'rol:repartidor'])->group(function () {

//     //pedidos
//     Route::get('/admin/pedidos', [PedidoController::class, 'indexAdmin']);
//     Route::post('/admin/pedido/{pedido}/modificar', [PedidoController::class, 'update']);

// });


Route::middleware('auth')->group(function () {

    //Tienes que estar logueado para poder acceder

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/platos', [PlatoController::class, 'index']);

    Route::get('/pedido/comprar', [PedidoController::class, 'shop']);
    Route::get('/pedido', [PedidoController::class, 'index']);
    Route::get('/pedido/{plato}', [PedidoController::class, 'store']);
    Route::post('update-pedido', [PedidoController::class, 'update']);
    Route::post('remove', [PedidoController::class, 'destroy']);
    Route::get('/pedido/plato/{row}/eliminar', [PedidoController::class, 'delete']);

    //repartidor
    Route::get('/admin/repartidores', [ProfileController::class, 'repartidores']);
    Route::post('/admin/repartidores/{repartidor}', [UserController::class, 'update']);
    Route::post('/admin/repartidores/{repartidor}/eliminar', [UserController::class, 'update']);
    
});



// Se puede accedersin loguearte
Route::get('/restaurantes', [RestauranteController::class, 'index']);
Route::get('/platos/{restaurante}', [RestauranteController::class, 'show']);
Route::get('/platos/detalle/{plato}', [PlatoController::class, 'show']);


Route::get('/error', function () {
    return view('admin.error');
});

require __DIR__ . '/auth.php';
