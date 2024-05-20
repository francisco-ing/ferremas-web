@include('header')
@if (Auth::check())
@if (Auth::user()->rol_usuario == 'admin')
<div class="p-2 mb-4 mx-auto text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800 max-w-md" role="alert">
  <div class="flex items-center">
    <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Info</span>
    <h3 class="text-lg font-medium">Haz iniciado sesión como ADMINISTRADOR!</h3>
  </div>
  <div class="mt-2 mb-4 text-sm">
    Para acceder a las funciones de tu rol dirígete al link de aquí abajo
  </div>
  <div class="flex justify-center">
    <button type="button" class="text-white bg-green-800 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
      <svg class="mr-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
        <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
      </svg>
      Ingresar a dashboard
    </button>
  </div>
</div>

@elseif (Auth::user()->rol_usuario == 'vendedor')

<div class="p-2 mb-4 mx-auto text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800 max-w-md" role="alert">
  <div class="flex items-center">
    <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Info</span>
    <h3 class="text-lg font-medium">Haz iniciado sesión como VENDEDOR!</h3>
  </div>
  <div class="mt-2 mb-4 text-sm">
    Para acceder a las funciones de tu rol dirígete al link de aquí abajo
  </div>
  <div class="flex justify-center">
    <button type="button" class="text-white bg-green-800 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
      <svg class="mr-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
        <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
      </svg>
      Ingresar a dashboard
    </button>
  </div>
</div>

@elseif (Auth::user()->rol_usuario == 'bodeguero')

<div class="p-2 mb-4 mx-auto text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800 max-w-md" role="alert">
  <div class="flex items-center">
    <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Info</span>
    <h3 class="text-lg font-medium">Haz iniciado sesión como BODEGUERO!</h3>
  </div>
  <div class="mt-2 mb-4 text-sm">
    Para acceder a las funciones de tu rol dirígete al link de aquí abajo
  </div>
  <div class="flex justify-center">
    <button type="button" class="text-white bg-green-800 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
      <svg class="mr-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
        <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
      </svg>
      Ingresar a dashboard
    </button>
  </div>
</div>

@elseif (Auth::user()->rol_usuario == 'contador')

<div class="p-2 mb-4 mx-auto text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800 max-w-md" role="alert">
  <div class="flex items-center">
    <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Info</span>
    <h3 class="text-lg font-medium">Haz iniciado sesión como CONTADOR!</h3>
  </div>
  <div class="mt-2 mb-4 text-sm">
    Para acceder a las funciones de tu rol dirígete al link de aquí abajo
  </div>
  <div class="flex justify-center">
    <button type="button" class="text-white bg-green-800 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
      <svg class="mr-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
        <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
      </svg>
      Ingresar a dashboard
    </button>
  </div>
</div>

@else

@endif
@endif

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



        
        <!-- Grid de productos -->
        <div class="flex justify-center items-center h-32"> <!-- h-32 define la altura, puedes ajustarla según sea necesario -->
            <h1 class="text-3xl font-semibold text-gray-800">Productos Destacados</h1>
        </div>
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
                @if ($producto->destacado)
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
                        
                    <p>No contamos con stock =(</p>
                    @endif   
                    @endif          
                    </div>
                @endif
            @endforeach

            <!-- Otras tarjetas de productos se pueden agregar aquí -->
        </div>
    </div>

   
@include('footer')