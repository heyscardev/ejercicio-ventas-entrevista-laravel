<x-app-layout>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Productos') }}
        </h2>
    </x-slot>

    <div class="row justify-center mt-5">
        <div class="col-lg-5 col-10">
            <form action="{{ route('producto.update', $producto->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombre">Nombre de Producto</label>
                    <input class="form-control" type="text" id="nombre" name="nombre"
                        placeholder="introduce nombre de producto" value="{{ $producto->nombre }}" required>
                </div>
                <div class="form-group">
                    <label class="" for="precio">Precio (con Impuesto aplicado $)</label>
                    <input class="form-control" type="number" step="0.01" id="precio" name="precio"
                        placeholder="introduce precio" value="{{ $producto->precio }}" required>
                </div>
                <div class="form-group">
                    <label class="" for="impuesto">impuesto (%)</label>
                    <input class="form-control" type="number" step="0.01" id="impuesto" name="impuesto"
                        placeholder="introduce impuesto" value="{{ $producto->impuesto_porcentaje }}" min="1" max="100"
                        required>
                </div>

                <div class="mt-3 text-center">
                    <a href="{{route('producto.index')}}" class="btn btn-secondary">Cancelar</a>
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>


            </form>
        </div>

    </div>



</x-app-layout>
