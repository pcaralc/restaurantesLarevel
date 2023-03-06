<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use App\Models\Pedido;
use App\Models\Plato;
use App\Models\Restaurante;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View as FacadesView;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.pedido');
    }

    public function indexAdmin()
    {
        return view('admin.pedidos', ['pedidos' => Pedido::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePedidoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Plato $plato)
    {
        $product = Plato::find($plato->id);
        $userID = Auth::user()->id;

        Cart::session($userID)->add(array(
            'id' => $product->id,
            'name' => $product->nombre,
            'price' => $product->precio,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        return view('web.platosRestaurante', ['restaurante' => $plato->restaurante, 'platos' => $plato->restaurante->platos()->where('restaurante_id', $plato->restaurante->id)->get()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePedidoRequest  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        $request->flash();

        $pedido->estado = $request->input('estado');
        
        $pedido->save();
        
        return view('admin.pedidos', ['pedidos' => Pedido::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }

    /**
     * Eliminar un plato del pedido
     */
    public function delete($id)
    {
        $userID = Auth::user()->id;
        Cart::session($userID)->remove($id);

        return view('web.pedido');
    }

    public function shop()
    {
        $items = Cart::session(Auth::user()->id)->getContent();
        $repartidor=User::where('estado', 'like', "libre")->first();

        foreach ($items as $item){
            $id=$item->id;
        }

        DB::insert('insert into pedidos (cliente_id, restaurante_id, repartidor_id, estado, created_at, update_at) values (?, ?, ?, ?, ?, ?)', [Auth::user()->id, Plato::find($id)->restaurante_id, $repartidor->id, 'recibido', Carbon::now(), Carbon::now()]);

        $pedido=Pedido::where('cliente_id', 'like', Auth::user()->id)->where('created_at', 'like', Carbon::now())->first();


        foreach ($items as $item) {
            DB::insert('insert into pedido_platos (pedido_id, plato_id) values (?, ?)', [$pedido->id, $item->id]);

        }
        
        Cart::session(Auth::user()->id)->clear();

        return view('web.restaurantes', ['restaurantes' => Restaurante::all()]);
    }
}
