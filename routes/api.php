<?php

use App\Http\Resources\ClienteResource;
use App\Http\Resources\PlatoResource;
use App\Http\Resources\RestauranteResource;
use App\Models\Plato;
use App\Models\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware('auth:sanctum')->group(function () {

    //Ver todos los restaurantes
    Route::get('/asocrest/restaurantes',  function () {
        return RestauranteResource::collection(Restaurante::all());
    });

    //Ver un restaurante por id
    Route::get('/asocrest/restaurantes/{id}',  function ($id) {
        return new RestauranteResource(Restaurante::findOrFail($id));
    });

    //Ver un cliente por dni
    Route::get('/asocrest/clientes/{dni}',  function ($dni) {
        return new ClienteResource(User::findOrFail($dni));
    });

    //Platos
    Route::get('/asocrest/platos',  function () {
        return  PlatoResource::collection(Plato::all());
    });
    Route::get('/asocrest/platos/{id}',  function ($id) {
        return new PlatoResource(Plato::findOrFail($id));
    });


    Route::put('/asocrest/restaurantes',  function ($request) {
        return RestauranteResource::create($request);
    });
    
    Route::delete('/asocrest/restaurantes/{id}', function (Restaurante $id) {
        $id->delete();
        return response()->json(['msg:' => 'Restaurante eliminado']);
    });

    Route::delete('/platos/{id}', function (Plato $id) {
    $id->delete();
    return response()->json(['msg:' => 'el plato ha sido eliminado correctamente']);
    });


});


//CREAR TOKEN
Route::post('/tokens/create', function (Request $request) {

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['error' => 'Usuario o contraseña incorrectos']);
    }

    $token = $user->createToken($request->email);

    return response()->json(['token' => $token->plainTextToken]);
});
