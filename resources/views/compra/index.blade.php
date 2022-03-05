<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>
    <div class="container-lg  ">
        <div class="row p-0 m-0   mt-5 ">
            @foreach ($productos as  $producto)
            <div class="col-lg-4 col-md-4  col-6 mt-3">
                <div class="card shadow hover-efect" style="width: 18rem;">
                    <img class="card-img-top shadow" src="{{asset('img/product-image.png')}}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title text-primary">{{$producto->nombre}}</h5>
                      <p class="card-text">{{$producto->precio}}$</p>
                      <form action="{{route('compra.store')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$producto->id}}" name="id_producto">
                        <button  class="btn btn-primary" type="submit">comprar</button>
                    </form>
                      
                    </div>
                  </div>
            </div> 
            @endforeach
            
        </div>
    </div>
   
</x-app-layout>
