<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos=Pedido::orderBy('id','DESC')->paginate(3);
        return view('home',compact('pedidos')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('creates');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'id_usuario'=>'required', 'modelo'=>'required', 'color'=>'required', 'tamano'=>'required', 'total'=>'required', 'info'=>'required']);
        Pedido::create($request->all());
        return redirect()->route('home')->with('success','Pedido enviado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedidos=Pedido::find($id);
        return  view('home',compact('pedidos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido=Pedido::find($id);
        return view('home',compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,['modelo'=>'required', 'color'=>'required', 'tamano'=>'required', 'total'=>'required', 'info'=>'required']);
        Pedido::find($id)->update($request->all());
        return redirect()->route('home')->with('success','Pedido actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pedido::find($id)->delete();
        return redirect()->route('home')->with('success','Pedido eliminado satisfactoriamente');
    }
}
