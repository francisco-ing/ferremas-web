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
    <h1 class="text-3xl font-bold mb-6">dd</h1>
</div>
<!-- vendedor.blade.php -->

<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-4">Compras Pendientes</h1>

    <div class="overflow-x-auto">


        <table class="table-auto w-full border-collapse border border-gray-300 shadow-lg">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="px-4 py-2 text-center border border-gray-300">ID Compra</th>
                    <th class="px-4 py-2 text-center border border-gray-300">Tipo Despacho</th>
                    <th class="px-4 py-2 text-center border border-gray-300">Detalles</th>
                    <th class="px-4 py-2 text-center border border-gray-300">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comprasAgrupadas as $compra)
                @if ($compra['picking'] === 0)
                <tr class="bg-white hover:bg-gray-100 transition duration-150 ease-in-out">
                    <td class="px-4 py-2 text-center border border-gray-300">{{ $compra['id_compra'] }}</td>
                    <td class="px-4 py-2 text-center border border-gray-300">{{ $compra['tipo_despacho'] }}</td>
                    <td class="px-4 py-2 text-center border border-gray-300">
                        @foreach ($compra['detalles'] as $detalle)
                            <div class="flex justify-between items-center">
                                <span>{{ $detalle['nombre_producto'] }}</span>
                                <span class="text-gray-500">{{ $detalle['cantidad'] }} Unidades</span>
                            </div>
                        @endforeach
                    </td>
                    <td class="px-4 py-2 text-center border border-gray-300">
                        <form id="form-despachar-{{ $compra['id_compra'] }}" action="{{ route('confirm-despacho', ['id' => $compra['id_compra']]) }}" method="POST">
                            @csrf
                            <button onclick="confirmDespachar({{ $compra['id_compra'] }})" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Pedido listo
                            </button>
                        </form>                        
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        
        
    </div>
</div>

</body>
<script>
    function confirmDespachar(id) {
        if (confirm('¿Estás seguro de que deseas marcar esta compra como lista?')) {
            document.getElementById('form-despachar-'+ id).submit();
        }
    }
</script>

</html>