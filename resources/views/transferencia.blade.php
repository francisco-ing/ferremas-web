<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <style>
        body {
            font-family: sans-serif;
            background-color: #f3f4f6;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .product-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-top: 20px;
        }
        .product-image {
            height: 100px;
            width: 100px;
        }
    </style>
</head>
<body>
    <header>
        <!-- Encabezado aquí si es necesario -->
    </header>

    <div class="container">
        <div class="card">
            <h3 class="text-2xl font-bold text-gray-700 mb-4">Datos de transferencia</h3>
            <ul class="divide-y">
                <li class="flex items-center justify-between py-3">
                    <span>Porfavor transfiere a la siguiente cuenta:</span>
                    <span class="font-bold"></span>
                    <span class="font-bold">11.111.111-1 <br> Cuenta vista <br> Banco Estado <br>${{ session('totalPrice') }} </span>
                </li>
                <li class="flex items-center justify-between py-3 font-bold">
                    <span>Tan pronto como confirmemos tu transferencia te lo haremos saber por correo</span>
                </li>
            </ul>
        </div>

            <div class="container">
        <div class="card">
            <h3 class="text-2xl font-bold text-gray-700 mb-4">Metodo de envio</h3>
            <ul class="divide-y">
            <div>
            @if(session('deliveryType') == 'retiro')  
            <p class="text-md font-bold text-[#333]">Tipo despacho: Despacho Domicilio</p>    
            <h3 class="text-m font-bold text-[#333] mt-4">Calle: {{ session('street') }}</h3>
            <h3 class="text-m font-bold text-[#333] mt-4">Ciudad: {{ session('city') }}</h3>
            <h3 class="text-m font-bold text-[#333] mt-4">Código Postal: {{ session('zipcode') }}</h3>
        @else 
        <p class="text-md font-bold text-[#333]">Tipo despacho: Retiro en Sucursal</p>    
        @endif
</div>

            </ul>
        </div>

        

        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                <div class="product-card flex items-start gap-4 py-8">
                    <div class="flex gap-6">
                        <div class="h-24 w-24 bg-gray-100 p-2 rounded">
                            <img src="{!! asset('images/Ferremas.png') !!}" class="product-image object-contain" />
                        </div>
                        <div>
                            <p class="text-md font-bold text-[#333]">{{ $details['nombre_producto']}}</p>
                            <h3 class="text-m font-bold text-[#333] mt-4">${{ $details['precio']}} C/u</h3>
                            <h3 class="text-xl font-bold text-[#333] mt-4">Cantidad: {{ $details['quantity'] }}</h3>
                            <h3 class="text-xl font-bold text-[#333] mt-4">Total: ${{ $details['precio'] * $details['quantity'] }}</h3>
                        </div>
                    </div>
                </div>
                
            @endforeach
        @else
            <div class="text-center mt-8">
                <h1 class="text-3xl font-bold mb-4">Parece que tu carrito está vacío =(</h1>
                <h2 class="text-xl font-semibold mb-6">Revisa nuestros mejores productos</h2>
                <a href="/laravel/ferremas/public/" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Ir a comprar
                </a>
            </div>
        @endif 

        <div class="mt-8 text-center">
            <a href="/laravel/ferremas/public/" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">Volver al inicio</a>
        </div>
    </div>

    <footer>
        <!-- Pie de página aquí si es necesario -->
    </footer>
</body>
</html>
