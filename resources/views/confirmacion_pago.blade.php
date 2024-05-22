<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Pago</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            max-width: 600px;
            margin: 0 auto;
        }
        .header {
            font-size: 24px;
            font-weight: bold;
        }
        .details {
            margin-top: 20px;
        }
        .details p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">Confirmación de Pago</div>
        <p>Hola {{ $user->name }},</p>
        <p>Gracias por tu compra. Aquí están los detalles de tu pedido:</p>

        <div class="details">
            @foreach ($cart as $id => $details)
                <p>Producto: {{ $details['nombre_producto'] }} - Cantidad: {{ $details['quantity'] }} - Precio: ${{ $details['precio'] }} C/u</p>
            @endforeach
            @if(session('deliveryType') == 'retiro')  
            <p class="text-md font-bold text-[#333]">Tipo despacho: Despacho Domicilio</p>    
            <h3 class="text-m font-bold text-[#333] mt-4">Calle: {{ session('street') }}</h3>
            <h3 class="text-m font-bold text-[#333] mt-4">Ciudad: {{ session('city') }}</h3>
            <h3 class="text-m font-bold text-[#333] mt-4">Código Postal: {{ session('zipcode') }}</h3>
            @else 
            <p class="text-md font-bold text-[#333]">Tipo despacho: Retiro en Sucursal</p>    
            @endif
            <p><strong>Total a pagar: ${{ $totalPrice }}</strong></p>
        </div>

        <p>¡Gracias por comprar con nosotros!</p>
    </div>
</body>
</html>
