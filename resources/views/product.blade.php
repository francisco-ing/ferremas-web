<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


@include('header')
<div class="container mx-auto py-8">


<div class="flex justify-between items-start">


    
    <!-- Grid de productos a la derecha -->
    <div class="w-3/4 p-4">
        <!-- Título del Grid -->
            <h1 class="text-3xl font-semibold text-gray-800">Martillos</h1>
        <!-- Grid de productos -->
         <div class="w-1/4 p-4">
         <label for="order" class="block text-sm font-medium text-gray-700">Ordenar por:</label>
<select id="order" name="sort" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
    <option value="price_asc">Precio: Menor a Mayor</option>
    <option value="price_desc">Precio: Mayor a Menor</option>
</select>

        </div>
         @if(session('success'))
         
        <div id="alert-1" class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50" role="alert">
         <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
         </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
            <p>{{ session('success' )}}</p>
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-1" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
        </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <!-- Ejemplo de tarjeta de producto -->
           

            @foreach ($productos as $producto)
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <img src="{!! asset('images/Ferremas.png') !!}" alt="Producto" class="w-full h-48 object-cover mb-4">
                        <h2 class="text-lg font-semibold text-gray-800">{{$producto->nombre_producto}}</h2>
                        <p class="text-sm text-gray-600">{{$producto->marca}}</p>
                        <p class="text-lg font-bold text-gray-700 mt-1">${{$producto->precio}}</p>
                        @if (Auth::check())
                        <a class="mt-4 bg-gray-800 text-white py-1 px-4 rounded-lg hover:bg-gray-700" href="{{ route('addproduct.to.cart', ['cod_producto' => $producto->cod_producto]) }}">Agregar al carrito</a>
                        @else
                        @endif
                       
                    </div>
            @endforeach
            
            

                    
            <!-- Otras tarjetas de productos se pueden agregar aquí -->
        </div>
    </div>
    </div>
</div>
@include('footer')
@yield('scripts')