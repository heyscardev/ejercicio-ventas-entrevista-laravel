<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Factura N° $factura->id") }}
        </h2>
    </x-slot>
    <div class="container mt-3 ">
        <div class="row rounded-pill  align-items-center justify-center" style="color: #007fa6; ">
            <div class="col-2 justify-center text-center ">
                <h5><span>Cliente: </span> {{$factura->user->name}}</h5>
            </div>
            <div class="col-3">
                <h5><span>Monto(sin impuesto): </span>{{$factura->total_sin_impuesto}}$</h5>
            </div>
            <div class="col-3">
                <h5><span>Monto de Impuestos: </span>{{$factura->impuesto_total}}$</h5>
            </div>
            <div class="col-3">
                <h5><span>Monto (con impuesto): </span>{{$factura->total}}$</h5>
            </div>
        </div>
    </div>
    <div class="row p-0 m-0 justify-center">
        <div class="col-12 col-md-10 col-lg-11">
            <table class="table table-hover">
                <thead class="text-white " style="background-color: #007fa6;">
                    <tr>
                        <th class="table-th text-white">Nombre de producto</th>
                        <th class="table-th text-white text-center">Precio $</th>
                        <th class="table-th text-white text-center">impuesto $</th>
                        <th class="table-th text-white text-center">Precio (impuesto incluido $)</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($factura->productos()->orderBy('created_at')->get() as $producto)

                   
                        <tr>
                            <td>
                                {{ $producto->nombre }}
                            </td>
                            <td class="text-center">
                                {{ round($producto->pivot->precio , 2) }}
                            </td>
                            <td class="text-center">{{ round($producto->pivot->impuesto,2) }}</td>    
                            <td class="text-center">
                                {{ round($producto->precio,2) }}
                            </td>
                            
                            
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
  
    
</x-app-layout>
