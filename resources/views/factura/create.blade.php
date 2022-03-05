<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generar Facturas') }}
        </h2>
    </x-slot>
    <div class="container mt-3 ">
        <div class="row rounded-pill  align-items-center justify-center" style="color: #007fa6; ">
            <div class="col">
                <form action="{{route('factura.store')}}" method="POST">
                    @csrf 
                    @method('POST')
                    <div class="text-center ">
                        <button class="btn btn-danger">Generar Facturas Pendientes</button>
                    </div>
                    
                </form>
            </div>
            
        </div>
    </div>
    
    
</x-app-layout>
