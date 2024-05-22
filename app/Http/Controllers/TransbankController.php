<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Transbank\Webpay\WebpayPlus;
use Transbank\Webpay\WebpayPlus\Transaction;
use Illuminate\Support\Facades\DB;

class TransbankController extends Controller
{
    
    public function __construct()
    {
        if (app()->environment('production')){
            WebpayPlus::configureForTesting();

        } else {
            WebpayPlus::configureForTesting();
        }
    }
    

  

    public function iniciar_compra(Request $request){
        $cart = $request->session()->get('cart', []);
        $totalPrice = $request->session()->get('totalPrice', 0);
        $user = Auth::user();

        // Crear nueva compra y guardar en la base de datos
        DB::table('compra')->insert([
            'total_compra' => $totalPrice, // Suponiendo que $totalPrice está definido en tu código
            'tipo_pago' => 'Tarjeta',
            'tipo_despacho' => 'Domicilio prueba', 
            'cliente' => $user->email
        ]);

        // Recuperar el ID de la última compra insertada
        $nueva_compra = DB::table('compra')->where('id_compra', DB::getPdo()->lastInsertId())->first();

        $url_to_pay = $this->start_web_pay_plus_transaction($nueva_compra);

                // Actualizar el stock de cada producto en el carrito
                foreach ($cart as $item) {
                    $nombre_producto = $item['nombre_producto'];
                    $quantity = $item['quantity'];
                    
                    // Actualizar el stock del producto en la base de datos
                    DB::update('UPDATE producto SET stock = stock - ? WHERE nombre_producto = ?', [$quantity, $nombre_producto]);
                }    
        
        return response()->json(['url' => $url_to_pay]);
    }

    public function start_web_pay_plus_transaction($nueva_compra)
    {
        $transaccion = (new Transaction)->create(
            $nueva_compra->id_compra,
            $nueva_compra->id_compra,
            $nueva_compra->total_compra,
            route('confirmar_pago')
        );
        $url = $transaccion->getUrl().'?token_ws='.$transaccion->getToken();
        return $url;
    }

    public function confirmar_pago(Request $request)
    {
        // Obtén los datos del carrito y el precio total desde la sesión
        $cart = $request->session()->get('cart', []);
        $totalPrice = $request->session()->get('totalPrice', 0);
        $user = Auth::user();
    
        // Envía el correo electrónico con una vista
       // Mail::send('confirmacion_pago', compact('cart', 'totalPrice', 'user'), function($message) use ($user) {
       //     $message->to($user->email)
       //             ->subject('Confirmación de pago');
       // });
    
        // Retorno o redirección después de enviar el correo
        return view('ticket_compra');
    }
    
    

}
