<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Factura') }}
        </h2>
    </x-slot>
    <div class="row p-0 m-0 justify-center mt-5">
        <div class="col-12 col-md-10 col-lg-11">
            <table class="table table-hover">
                <thead class="text-white " style="background-color: #007fa6;">
                    <tr>
                        <th class="table-th text-white">id</th>
                        <th class="table-th text-white text-center">Cliente</th>
                        <th class="table-th text-white text-center">Fecha</th>
                        <th class="table-th text-white text-center">Hora</th>
                        <th class="table-th text-white text-center">Total</th>
                        <th class="table-th text-white text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($facturas as $factura)
                        <tr>
                            <td>
                                {{ $factura->id }}
                            </td>
                            <td class="text-center">
                                {{  $factura->user->name }}
                            </td>
                            <td class="text-center">
                                {{ date("d/m/Y",strtotime($factura->created_at)) }}
                            </td>
                            <td class="text-center">
                                {{ date("h:m:s A",strtotime($factura->created_at)) }}
                            </td>
                            <td class="text-center">{{  $factura->total}}</td>
                            <td class="justify-center  d-flex">
                                <a href="{{route('factura.show',$factura->id)}}">
                                    <span class="material-icons "> visibility </span>
                                </a>
                                
                                


                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
   
    
</x-app-layout>
