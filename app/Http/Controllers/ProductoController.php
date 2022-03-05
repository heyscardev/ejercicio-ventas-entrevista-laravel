<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Factura;
use App\Models\Producto;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all()->sortBy('nombre');
        return view('producto.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $producto = new Producto();
      $producto->nombre = $request->nombre;
      $producto->precio  = $request->precio;
      $producto->impuesto_porcentaje = $request->impuesto;
      $producto->save();
      Session::flash('success', 'Producto guardado con éxito!');
      return redirect()->route('producto.index');
      
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return(view('producto.edit',compact('producto')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
       
        $producto->nombre = $request->nombre;
        $producto->precio  = $request->precio;
        $producto->impuesto_porcentaje = $request->impuesto;
        $producto->save();
        Session::flash('success', 'Producto actualizado con éxito!');
        return redirect()->route('producto.index');
    }
    public function destroy(Producto $producto)
    {
        
        if($producto->compras()->count()== 0 && $producto->facturas()->count() == 0){
            $producto->delete();
            Session::flash('success', 'Producto eliminado con éxitó!');
        }else{
            Session::flash('error', 'El producto no se puede eliminar porque fue comprado!');
        }
        
        return back();
    }
}
