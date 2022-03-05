<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>
    <div class="row p-0 m-0 justify-center">
        <div class="col-12 col-md-10 col-lg-11">
            <table class="table table-hover">
                <thead class="text-white " style="background-color: #007fa6;">
                    <tr>
                        <th class="table-th text-white">Nombre</th>
                        <th class="table-th text-white text-center">Precio </th>
                        <th class="table-th text-white text-center">Precio (impuesto incluido $)</th>
                        <th class="table-th text-white text-center">impuesto %</th>
                        <th class="table-th text-white text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>
                                {{ $producto->nombre }}
                            </td>
                            <td class="text-center">
                                {{ round($producto->precio_base, 2) }}
                            </td>
                            <td class="text-center">
                                {{ $producto->precio }}
                            </td>
                            <td class="text-center">{{ $producto->impuesto_porcentaje }}</td>
                            <td class="justify-center  d-flex">
                                <a href="{{ route('producto.edit', $producto->id) }}">
                                    <span class="material-icons "> edit </span>
                                </a>
                                &nbsp

                                <button data-action="{{ route('producto.destroy', $producto->id) }}" type="button"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    onclick="invokeModalDelete(this)">
                                    <span class="material-icons "> delete </span>

                                </button>


                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
    <div class="boton-navegable ">
        <a href="{{ route('producto.create') }}">
            <span class="material-icons"> add </span>
        </a>
    </div>
    <!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmacion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    ¿Estas Seguro de eliminar este recurso?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
                    <form action="sss" id="delete-form" method="POST" style="display:inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">SI</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        invokeModalDelete = (event) => {
            const form = document.getElementById('delete-form');
            form.action = event.getAttribute('data-action');
            console.log(form.action)
        }
    </script>


</x-app-layout>
