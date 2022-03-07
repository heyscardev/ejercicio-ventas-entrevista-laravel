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
        return view('factura.index', compact('facturas'));
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
        if (Compra::where('estado', 'pendiente')->count() == 0) {
            Session::flash('warning', 'no hay compras pendientes en este momento!');
            return back();
        } else {;
            foreach (Compra::comprasPendientesUserUnique() as $user) {
                $factura = new Factura();
                $factura->user_id = $user->user_id;
                $factura->estado = 'pendiente';
                $factura->save();
                $facturas[] = $factura;

                foreach (Compra::comprasPendientesByUserid($user->user_id) as $compra) {

                    $factura->productos()->attach($compra->producto_id, [
                        'precio' => $compra->producto->precioBase,
                        'impuesto' => $compra->producto->impuesto
                    ]);
                    $compra->estado = 'facturado';
                    $compra->save();
                }
            }
            Session::flash('success', 'facturas generadas exitosamente');
            return view('factura.index', compact('facturas'));
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
        return view('factura.show', compact('factura'));
    }
}
