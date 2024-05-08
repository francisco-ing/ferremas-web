<head>
    <title>Carrito</title>
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@include('header')
<div class="container mx-auto py-8">
    <div class="font-[sans-serif] bg-white">
        <div class="lg:max-w-7xl max-w-xl mx-auto">
            <div class="grid lg:grid-cols-3 gap-8 items-start mt-8">
                <div class="divide-y lg:col-span-2">     
                </div>
                <div class="bg-gray-100 p-8 flex-grow flex justify-center items-center">
                    <div>
                        <h3 class="text-2xl font-bold text-[#333]">Orden</h3>
                        <ul class="text-[#333] mt-6 divide-y">
                            <li class="flex flex-wrap gap-4 text-md py-3">Subtotal <span class="ml-auto font-bold">${{ session('totalPrice') * 0.81 }}</span></li>
                            <li class="flex flex-wrap gap-4 text-md py-3">Envio <span class="ml-auto font-bold">$0</span></li>
                            <li class="flex flex-wrap gap-4 text-md py-3">Impuestos <span class="ml-auto font-bold">${{ session('totalPrice') * 0.19 }}</span></li>
                            <li class="flex flex-wrap gap-4 text-md py-3 font-bold">Total <span class="ml-auto">${{ session('totalPrice') }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    

@include('footer')
