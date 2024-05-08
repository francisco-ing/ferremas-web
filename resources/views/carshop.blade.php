<head><title>Carrito</title></head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@include('header')

<div class="container mx-auto py-8">
<div class="font-[sans-serif] bg-white">
      <div class="lg:max-w-7xl max-w-xl mx-auto">
        <div class="grid lg:grid-cols-3 gap-8 items-start mt-8">
          <div class="divide-y lg:col-span-2">

          
          @if(session('cart'))
            @foreach(session('cart') as $id => $details)
          <!--- PRODUCTO--->
          <div class="flex items-start justify-between gap-4 py-8">
              <div class="flex gap-6">
                <div class="h-64 bg-gray-100 p-6 rounded">
                  <img src="{!! asset('images/Ferremas.png') !!}" class="w-full h-full object-contain shrink-0" />
                </div>
                <div>
                  <p class="text-md font-bold text-[#333]">{{ $details['nombre_producto']}}</p>
                  <h3 class="text-m font-bold text-[#333] mt-4">${{ $details['precio']}} C/u</h3>
                  <h3 class="text-xl font-bold text-[#333] mt-4">$Total: {{ $details['precio'] * $details['quantity'] }}</h3>
                </div>
              </div>

              <div class="flex items-center justify-center mt-4">
                  <form action="{{ route('delete.cart.product', ['cod_producto' => $id]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="bg-gray-300 text-gray-700 py-1 px-3 rounded-l-lg focus:outline-none focus:bg-gray-400">-</button>
                  </form>
                  <div class="mx-4 text-xl font-bold">{{ $details['quantity'] }}</div>
                  <form action="{{ route('addproduct.to.cart', ['cod_producto' =>  $id]) }}" method="POST">
                      @csrf    
                      <button type="submit" class="bg-gray-300 text-gray-700 py-1 px-3 rounded-r-lg focus:outline-none focus:bg-gray-400">+</button>
                  </form>
              </div>

              

            </div>

            @endforeach
 
          </div>
          <div class="bg-gray-100 p-8">
            <h3 class="text-2xl font-bold text-[#333]">Orden</h3>
            <ul class="text-[#333] mt-6 divide-y">
              <li class="flex flex-wrap gap-4 text-md py-3">Subtotal <span class="ml-auto font-bold">${{ session('totalPrice') * 0.81 }}</span></li>
              <li class="flex flex-wrap gap-4 text-md py-3">Envio <span class="ml-auto font-bold">$0</span></li>
              <li class="flex flex-wrap gap-4 text-md py-3">Impuestos <span class="ml-auto font-bold">${{ session('totalPrice') * 0.19 }}</span></li>
              <li class="flex flex-wrap gap-4 text-md py-3 font-bold">Total <span class="ml-auto">${{ session('totalPrice') }}</span></li>
            </ul>
            <button class="modal-open mt-6 text-md px-6 py-2.5 w-full bg-blue-600 hover:bg-blue-700 text-white rounded">Elegir medio de pago</button>
  <!--Modal-->
<div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
  <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

  <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

    <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
      <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
      </svg>
      <span class="text-sm">(Esc)</span>
    </div>

    <div class="modal-content py-4 text-left px-6">
      <div class="flex justify-between items-center pb-3">
        <p class="text-2xl font-bold">Metodos de pago</p>
        <div class="modal-close cursor-pointer z-50">
          <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
          </svg>
        </div>
      </div>

      <form class="max-w-sm mx-auto">
        <label for="payment_method" class="block mb-2 text-sm font-medium text-gray-200 dark:text-white">Select a payment method</label>
        <select id="payment_method" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option value="TAR">Tarjeta</option>
          <option value="TRANS">Transferencia</option>
        </select>
      </form>

      <div class="flex justify-end pt-2">  
        <button id="btnIniciarCompra" class="px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400"">Aceptar</button>
        <button class="modal-close px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2" >Cancelar</button>
      </div>
    </div>
  </div>
</div>
            
            @else
              <h1 class="text-3xl font-bold mb-4">Parece que tu carrito está vacío =(</h1>
              <h2 class="text-xl font-semibold mb-6">Revisa nuestros mejores productos</h2>
              <a href="/laravel/ferremas/public/" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Ir a comprar
              </a>
            @endif  
            
          </div>
        </div>
      </div>
    </div>
</div>    


<script>
    var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener('click', function(event){
    	event.preventDefault()
    	toggleModal()
      })
    }
    
    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)
    
    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
      closemodal[i].addEventListener('click', toggleModal)
    }
    
    document.onkeydown = function(evt) {
      evt = evt || window.event
      var isEscape = false
      if ("key" in evt) {
    	isEscape = (evt.key === "Escape" || evt.key === "Esc")
      } else {
    	isEscape = (evt.keyCode === 27)
      }
      if (isEscape && document.body.classList.contains('modal-active')) {
    	toggleModal()
      }
    };
    
    

    function toggleModal () {
      const body = document.querySelector('body')
      const modal = document.querySelector('.modal')
      modal.classList.toggle('opacity-0')
      modal.classList.toggle('pointer-events-none')
      body.classList.toggle('modal-active')
    }

  // CONTROLA LA SELECCION DE METDODO DE PAGO

  document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('btnIniciarCompra').addEventListener('click', function() {
        var paymentMethod = document.getElementById('payment_method').value;
        if (paymentMethod === 'TAR') {
            fetch('{{ route('iniciar_compra') }}')
                .then(response => response.json())
                .then(data => {
                    console.log(data); // Imprimir los datos en la consola
                    window.location.href = data.url;
                });
        } else if (paymentMethod === 'TRANS') {
            console.log('Redirigiendo a la vista de transferencia...');
            window.location.href = 'transferencia'; // Reemplaza "transferencia" con la ruta correspondiente a tu vista de transferencia
        }
    });
});

  </script>
@include('footer')