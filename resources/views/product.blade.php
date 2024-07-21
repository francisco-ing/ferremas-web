@include('header')

<!-- Contenido de la página -->
@if (Auth::check())
@else
    <!-- Contenido cuando el usuario no está autenticado -->
    <div class="max-w-md mx-auto text-center">
        <h1 class="text-3xl font-bold mb-4">¡Inicia Sesión para acceder a todas las funcionalidades y beneficios!</h1>
        <!-- Puedes agregar más contenido o elementos aquí -->
    </div>
@endif


<div class="container mx-auto py-8">

   

        
        @if(session('success'))
         
         <div id="alert-1" class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
          <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
           <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
          </svg>
             <span class="sr-only">Info</span>
             <div class="ms-3 text-sm font-medium">
             <p>{{ session('success' )}}</p>
         </div>
         <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
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
                        <img src="{{$producto->imagen_producto}}" alt="Producto" style="display: block; margin: auto;  width: 200px !important; height: 200px !important;">
                        <h2 class="text-lg font-semibold text-gray-800">{{$producto->nombre_producto}}</h2>
                        <p class="text-sm text-gray-600">{{$producto->marca}}</p>
                        <p class="text-sm text-gray-600">Stock disponible: {{$producto->stock}}</p>
                        <p class="text-lg font-bold text-gray-700 mt-1">${{$producto->precio}}</p>
                           @if (Auth::check())
                           @if ($producto->stock > 0)
                           <form action="{{ route('addproduct.to.cart', ['cod_producto' => $producto->cod_producto]) }}" method="POST">
                              @csrf
                              <div class="flex items-center mt-4">
                                  <input type="number" name="quantity" class="block w-16 bg-gray-100 border border-gray-300 text-gray-700 py-1 px-2 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" value="1" min="1">
                                  <button type="submit" class="ml-2 bg-gray-800 text-white py-1 px-4 rounded-lg hover:bg-gray-700">Agregar al carrito</button>
                              </div>
                            </form>
                            
                           @else
                    @endif    
                    @endif               
                    </div>
            @endforeach
            <!-- Otras tarjetas de productos se pueden agregar aquí -->
        </div>
    </div>
@include('footer')
@yield('scripts')