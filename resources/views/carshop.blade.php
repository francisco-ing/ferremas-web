<head><title>Carrito</title></head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@include('header')
<div class="container mx-auto py-8">
<div class="font-[sans-serif] bg-white">
      <div class="lg:max-w-7xl max-w-xl mx-auto">
        <div class="grid lg:grid-cols-3 gap-8 items-start mt-8">
          <div class="divide-y lg:col-span-2">

          @if(session('cart'))
            @foreach(session('cart') as $id => $details)
          <!--- PRODUCTO--->
          <div class="flex items-start justify-between gap-4 py-8">
              <div class="flex gap-6">
                <div class="h-64 bg-gray-100 p-6 rounded">
                  <img src="{!! asset('images/Ferremas.png') !!}" class="w-full h-full object-contain shrink-0" />
                </div>
                <div>
                  <p class="text-md font-bold text-[#333]">{{ $details['nombre_producto']}}</p>
                  <p class="text-gray-400 text-xs mt-1">Cantidad: {{ $details['quantity']}}</p>
                  <h4 class="text-xl font-bold text-[#333] mt-4">${{ $details['precio']*200}}</h4>
                </div>
              </div>
              <form action="{{ route('delete.cart.product', ['cod_producto' => $id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Eliminar</button>
              </form>
            </div>
            
            @endforeach

          </div>
          <div class="bg-gray-100 p-8">
            <h3 class="text-2xl font-bold text-[#333]">Orden</h3>
            <ul class="text-[#333] mt-6 divide-y">
              <li class="flex flex-wrap gap-4 text-md py-3">Subtotal <span class="ml-auto font-bold">$15.000</span></li>
              <li class="flex flex-wrap gap-4 text-md py-3">Envio <span class="ml-auto font-bold">$5.000</span></li>
              <li class="flex flex-wrap gap-4 text-md py-3">Impuestos <span class="ml-auto font-bold">$5.000</span></li>
              <li class="flex flex-wrap gap-4 text-md py-3 font-bold">Total <span class="ml-auto">$25.000</span></li>
            </ul>
            <button type="button" class="mt-6 text-md px-6 py-2.5 w-full bg-blue-600 hover:bg-blue-700 text-white rounded">Confirmar compra</button>
          </div>
        </div>
      </div>
    </div>
</div>           
@endif  
@include('footer')