<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bodegueros</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<header class="bg-gray-300 fixed w-full top-0 z-50 h-16">
        <div class="container mx-auto px-6 py-3 h-full"> 
            <div class="flex items-center justify-center h-full">
                <div>
                    <a class="font-bold text-xl text-gray-800" href="#">
                        Dashboard Bodeguero
                    </a>
                </div>

                <div class="md:flex items-center ml-auto"> <!-- Mover este contenido hacia la derecha -->
                  @if (Auth::check())
                    <form class="text-white mr-4" action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none" type="submit">Cerrar sesión</button>
                    </form>
                 @endif
                </div>
            </div>
        </div>
</header>

<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-6">Lista de Productos</h1>

    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-400">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Marca</th>
                    <th class="px-4 py-2">Stock</th>
                    <th class="px-4 py-2">Precio</th>
                    <th class="px-4 py-2">Destacado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                @if($producto->stock > 0)
                <tr class="{{ $producto->destacado ? 'bg-yellow-100' : '' }}">
                    <td class="px-4 py-2">{{ $producto->nombre_producto }}</td>
                    <td class="px-4 py-2">{{ $producto->marca }}</td>
                    <td class="px-4 py-2">{{ $producto->stock }}</td>
                    <td class="px-4 py-2">${{ $producto->precio }}</td>
                    <td class="px-4 py-2">{{ $producto->destacado ? 'Sí' : 'No' }}</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- vendedor.blade.php -->

<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-4">Compras Sin Picking Realizado</h1>

    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-400">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">ID Compra</th>
                    <th class="px-4 py-2">Precio Total</th>
                    <th class="px-4 py-2">Tipo Despacho</th>
                    <th class="px-4 py-2">Datos Despacho</th>
                    <th class="px-4 py-2">Usuario</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($compras as $compra)
                @if ((isset($compra->picking) && $compra->picking === 0 || is_null($compra->picking)) && 
                    (isset($compra->transferencia_pagada) && $compra->transferencia_pagada === 1 || is_null($compra->transferencia_pagada)))
                    <tr>
                        <td class="px-4 py-2">{{ $compra->id_compra }}</td>
                        <td class="px-4 py-2">${{ $compra->precio_total }}</td>
                        <td class="px-4 py-2">{{ $compra->tipo_despacho }}</td>
                        <td class="px-4 py-2">{{ $compra->datos_despacho }}</td>
                        <td class="px-4 py-2">{{ $compra->usuario }}</td>
                    </tr>
                @endif
            @endforeach
                    
            </tbody>
        </table>
    </div>

    <h1 class="text-3xl font-bold mb-4">Compras Con Picking Realizado</h1>

    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-400">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">ID Compra</th>
                    <th class="px-4 py-2">Precio Total</th>
                    <th class="px-4 py-2">Tipo Despacho</th>
                    <th class="px-4 py-2">Datos Despacho</th>
                    <th class="px-4 py-2">Usuario</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($compras as $compra)
                @if ($compra->picking === 1)
                    <tr>
                        <td class="px-4 py-2">{{ $compra->id_compra }}</td>
                        <td class="px-4 py-2">${{ $compra->precio_total }}</td>
                        <td class="px-4 py-2">{{ $compra->tipo_despacho }}</td>
                        <td class="px-4 py-2">{{ $compra->datos_despacho }}</td>
                        <td class="px-4 py-2">{{ $compra->usuario }}</td>
                    </tr>
                @endif
            @endforeach
            
            </tbody>
        </table>
    </div>
</div>

</body>
</html>