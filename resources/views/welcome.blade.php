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
        <div
  id="carouselExampleCaptions"
  class="relative"
  data-twe-carousel-init
  data-twe-ride="carousel">
  <!--Carousel indicators-->
  <div
    class="absolute bottom-0 left-0 right-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0"
    data-twe-carousel-indicators>
    <button
      type="button"
      data-twe-target="#carouselExampleCaptions"
      data-twe-slide-to="0"
      data-twe-carousel-active
      class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
      aria-current="true"
      aria-label="Slide 1"></button>
    <button
      type="button"
      data-twe-target="#carouselExampleCaptions"
      data-twe-slide-to="1"
      class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
      aria-label="Slide 2"></button>
    <button
      type="button"
      data-twe-target="#carouselExampleCaptions"
      data-twe-slide-to="2"
      class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
      aria-label="Slide 3"></button>
  </div>

  <!--Carousel items-->
  <div
    class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
    <!--First item-->
    <div
      class="relative float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
      data-twe-carousel-active
      data-twe-carousel-item
      style="backface-visibility: hidden">
      <img
      src="{!! asset('images/slider1.png') !!}"
        class="block w-full"
        alt="..." />
      <div
        class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
      </div>
    </div>
    <!--Second item-->
    <div
      class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
      data-twe-carousel-item
      style="backface-visibility: hidden">
      <img
      src="{!! asset('images/slider2.png') !!}"
        class="block w-full"
        alt="..." />
      <div
        class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
      </div>
    </div>
    <!--Third item-->
    <div
      class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
      data-twe-carousel-item
      style="backface-visibility: hidden">
      <img
      src="{!! asset('images/slider3.png') !!}"
        class="block w-full"
        alt="..." />
      <div
        class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
      </div>
    </div>
  </div>

  <!--Carousel controls - prev item-->
  <button
    class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
    type="button"
    data-twe-target="#carouselExampleCaptions"
    data-twe-slide="prev">
    <span class="inline-block h-8 w-8">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="h-6 w-6">
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M15.75 19.5L8.25 12l7.5-7.5" />
      </svg>
    </span>
    <span
      class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
      >Previous</span
    >
  </button>
  <!--Carousel controls - next item-->
  <button
    class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
    type="button"
    data-twe-target="#carouselExampleCaptions"
    data-twe-slide="next">
    <span class="inline-block h-8 w-8">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="h-6 w-6">
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M8.25 4.5l7.5 7.5-7.5 7.5" />
      </svg>
    </span>
    <span
      class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
      >Next</span
    >
  </button>
</div>
        
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
                        <img src="{!! asset('images/Ferremas.png') !!}" alt="Producto" class="w-full h-48 object-cover mb-4">
                        <h2 class="text-lg font-semibold text-gray-800">{{$producto->nombre_producto}}</h2>
                        <p class="text-sm text-gray-600">{{$producto->marca}}</p>
                        <p class="text-sm text-gray-600">Stock disponible: {{$producto->stock}}</p>
                        <p class="text-lg font-bold text-gray-700 mt-1">${{$producto->precio}}</p>
                           @if (Auth::check())
                           <form action="{{ route('addproduct.to.cart', ['cod_producto' => $producto->cod_producto]) }}" method="POST">
                              @csrf
                              <div class="flex items-center mt-4">
                                  <input type="number" name="quantity" class="block w-16 bg-gray-100 border border-gray-300 text-gray-700 py-1 px-2 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" value="1" min="1">
                                  <button type="submit" class="ml-2 bg-gray-800 text-white py-1 px-4 rounded-lg hover:bg-gray-700">Agregar al carrito</button>
                              </div>
                            </form>
                           @else
                    @endif                
                    </div>
                @endif
            @endforeach

            <!-- Otras tarjetas de productos se pueden agregar aquí -->
        </div>
    </div>
@include('footer')