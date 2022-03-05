<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Factura;
use App\Models\FacturaProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas = Factura::all()->sortByDesc('created_at');
        return view('factura.index',compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('factura.create');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $compras = Compra::where('estado','pendiente');
       
        if($compras->count()== 0){
            Session::flash('warning', 'no hay compras pendientes en este momento!');
            return back();
        }else{
            $compras1 = new Compra();
            $facturas = [];
            foreach($compras1->compra_dif_user as $compra){
               
                $factura = new Factura();
                $factura->user_id = $compra->user_id;
                $factura->estado = 'pendiente';
                $factura->save();
                $facturas[] = $factura;
                $comprasAFacturar = Compra::whereUserId($factura->user_id)->whereEstado('pendiente')->orderByDesc('created_at')->get();
                
                foreach($comprasAFacturar as $compra2){
                    $detail = new FacturaProducto();
                    $detail->factura_id = $factura->id;
                    $detail->producto_id = $compra2->producto->id;
                    $detail->precio = $compra2->producto->precio_base;
                    $detail->impuesto = $compra2->producto->impuesto;
                    $detail->save();
                    $compra2->estado = 'facturado';
                    $compra2->save();
                }
            }
           
            Session::flash('success', 'facturas generadas exitosamente');
            return view('factura.index',compact('facturas'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $factura)
    {
        return view('factura.show',compact('factura'));
    }

}
