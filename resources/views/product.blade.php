@include('header')
<div class="flex justify-between items-start">
    <!-- Menú de filtrado a la izquierda -->
    <div class="flex flex-col justify-start w-1/4 p-4">
        <!-- Agrega aquí tu menú de filtrado -->
        <h1 class="text-3xl font-semibold text-gray-800">Filtros</h1>
        <ul>
            <li class="mb-2">
                <a href="#" class="text-gray-700 hover:text-gray-900">Marca</a>
            </li>
            <li class="mb-2">
                <a href="#" class="text-gray-700 hover:text-gray-900">Precio</a>
            </li>
            <li class="mb-2">
                <a href="#" class="text-gray-700 hover:text-gray-900"></a>
            </li>
            <!-- Agrega más categorías según sea necesario -->
        </ul>
    </div>

    
    <!-- Grid de productos a la derecha -->
    <div class="w-3/4 p-4">
        <!-- Título del Grid -->
            <h1 class="text-3xl font-semibold text-gray-800">Martillos</h1>
        <!-- Grid de productos -->
         <div class="w-1/4 p-4">
        <label for="sort" class="block text-sm font-medium text-gray-700">Ordenar por:</label>
        <select id="sort" name="sort" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            <option value="price_asc">Precio: Menor a Mayor</option>
            <option value="price_desc">Precio: Mayor a Menor</option>
            <option value="rating_asc">Valoración: Menor a Mayor</option>
            <option value="rating_desc">Valoración: Mayor a Menor</option>
        </select>
    </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <!-- Ejemplo de tarjeta de producto -->
            <div class="bg-white rounded-lg shadow-md p-4">
                <img src="{!! asset('images/Ferremas.png') !!}" alt="Producto" class="w-full h-48 object-cover mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Taladro percutor Bauker</h2>
                <p class="text-sm text-gray-600">Bauker</p>
                <p class="text-lg font-bold text-gray-700 mt-2">$29.990</p>
                <button class="mt-4 bg-gray-800 text-white py-2 px-4 rounded-lg hover:bg-gray-700">Añadir al Carrito</button>
            </div>

            <div class="bg-white rounded-lg shadow-md p-4">
                <img src="{!! asset('images/Ferremas.png') !!}" alt="Producto" class="w-full h-48 object-cover mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Ferremas</h2>
                <p class="text-sm text-gray-600">Ferremas es la leche</p>
                <p class="text-lg font-bold text-gray-700 mt-2">$50.000</p>
                <button class="mt-4 bg-gray-800 text-white py-2 px-4 rounded-lg hover:bg-gray-700">Añadir al Carrito</button>
            </div>


            <div class="bg-white rounded-lg shadow-md p-4">
                <img src="{!! asset('images/Ferremas.png') !!}" alt="Producto" class="w-full h-48 object-cover mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Ferremas</h2>
                <p class="text-sm text-gray-600">Ferremas es la leche</p>
                <p class="text-lg font-bold text-gray-700 mt-2">$50.000</p>
                <button class="mt-4 bg-gray-800 text-white py-2 px-4 rounded-lg hover:bg-gray-700">Añadir al Carrito</button>
            </div>


            <div class="bg-white rounded-lg shadow-md p-4">
                <img src="{!! asset('images/Ferremas.png') !!}" alt="Producto" class="w-full h-48 object-cover mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Ferremas</h2>
                <p class="text-sm text-gray-600">Ferremas es la leche</p>
                <p class="text-lg font-bold text-gray-700 mt-2">$50.000</p>
                <button class="mt-4 bg-gray-800 text-white py-2 px-4 rounded-lg hover:bg-gray-700">Añadir al Carrito</button>
            </div>


            <div class="bg-white rounded-lg shadow-md p-4">
                <img src="{!! asset('images/Ferremas.png') !!}" alt="Producto" class="w-full h-48 object-cover mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Ferremas</h2>
                <p class="text-sm text-gray-600">Ferremas es la leche</p>
                <p class="text-lg font-bold text-gray-700 mt-2">$50.000</p>
                <button class="mt-4 bg-gray-800 text-white py-2 px-4 rounded-lg hover:bg-gray-700">Añadir al Carrito</button>
            </div>


            <div class="bg-white rounded-lg shadow-md p-4">
                <img src="{!! asset('images/Ferremas.png') !!}" alt="Producto" class="w-full h-48 object-cover mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Ferremas</h2>
                <p class="text-sm text-gray-600">Ferremas es la leche</p>
                <p class="text-lg font-bold text-gray-700 mt-2">$50.000</p>
                <button class="mt-4 bg-gray-800 text-white py-2 px-4 rounded-lg hover:bg-gray-700">Añadir al Carrito</button>
            </div>


            <div class="bg-white rounded-lg shadow-md p-4">
                <img src="{!! asset('images/Ferremas.png') !!}" alt="Producto" class="w-full h-48 object-cover mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Ferremas</h2>
                <p class="text-sm text-gray-600">Ferremas es la leche</p>
                <p class="text-lg font-bold text-gray-700 mt-2">$50.000</p>
                <button class="mt-4 bg-gray-800 text-white py-2 px-4 rounded-lg hover:bg-gray-700">Añadir al Carrito</button>
            </div>


            <div class="bg-white rounded-lg shadow-md p-4">
                <img src="{!! asset('images/Ferremas.png') !!}" alt="Producto" class="w-full h-48 object-cover mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Ferremas</h2>
                <p class="text-sm text-gray-600">Ferremas es la leche</p>
                <p class="text-lg font-bold text-gray-700 mt-2">$50.000</p>
                <button class="mt-4 bg-gray-800 text-white py-2 px-4 rounded-lg hover:bg-gray-700">Añadir al Carrito</button>
            </div>
            <!-- Otras tarjetas de productos se pueden agregar aquí -->
        </div>
    </div>
    </div>
</div>

@include('footer')