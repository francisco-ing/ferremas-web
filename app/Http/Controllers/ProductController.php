<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Transbank\Webpay\WebpayPlus;
use Transbank\Webpay\WebpayPlus\Transaction;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


    public function deleteProductFromCart($cod_producto){
        $cart = session()->get('cart', []);
    
        if(isset($cart[$cod_producto])){
            // Obtener el precio del producto que se va a eliminar
            $deletedProductPrice = $cart[$cod_producto]['precio'];
    
            if($cart[$cod_producto]['quantity'] > 1){
                $cart[$cod_producto]['quantity']--;
            } else {
                unset($cart[$cod_producto]);
            }
    
            // Calcular el precio total restando el precio del producto eliminado
            $totalPrice = session('totalPrice', 0) - $deletedProductPrice;
    
            // Si el producto eliminado era el último de su tipo, ajustar el precio total a 0
            if(empty($cart)){
                $totalPrice = 0;
            }
    
            // Almacenar el carrito actualizado y el precio total actualizado en la sesión
            session()->put('cart', $cart);
            session()->put('totalPrice', $totalPrice);
    
            return redirect()->back()->with('success', 'Se eliminó un producto del carrito.');
        } else {
            return redirect()->back()->with('error', 'El producto no existe en el carrito.');
        }
    }
    
    
    
    public function addProducttoCart(Request $request, $cod_producto){
        $product = DB::table('producto')->where('cod_producto', $cod_producto)->first();
        $cart = session()->get('cart', []);
        $totalPrice = 0;
        
        $quantity = $request->input('quantity', 1); // Obtener la cantidad del formulario
    
        if(isset($cart[$cod_producto])){
            $cart[$cod_producto]['quantity'] += $quantity; // Aumentar la cantidad
        } else {
            $cart[$cod_producto] = [
                "nombre_producto" => $product->nombre_producto,
                "quantity" => $quantity,
                "precio" => $product->precio,
                "marca" => $product->marca,
            ];
        }
    
        // Calcular el precio total
        foreach($cart as $item) {
            $totalPrice += $item['precio'] * $item['quantity'] ;
        }
    
        session()->put('cart', $cart);
        session()->put('totalPrice', $totalPrice);
    
        return redirect()->back()->with('success', 'Producto agregado al carrito!');
    }
    

    public function mostrarProductos() {
        $cod_subcategoria = request()->query('cod_subcategoria');
        $orden = request()->query('sort', 'price_asc');
    
        $query = "
            SELECT p.*
            FROM producto p
            INNER JOIN subcategoria s ON p.cod_subcategoria = s.cod_subcategoria
            INNER JOIN categoria c ON s.cod_categoria = c.cod_categoria
            WHERE p.cod_subcategoria = :cod_subcategoria
        ";
    
        switch ($orden) {
            case 'price_asc':
                $query .= " ORDER BY p.precio ASC";
                break;
            case 'price_desc':
                $query .= " ORDER BY p.precio DESC";
                break;
            case 'rating_asc':
                $query .= " ORDER BY p.valoracion ASC";
                break;
            case 'rating_desc':
                $query .= " ORDER BY p.valoracion DESC";
                break;
            default:
                // Ordenar por precio de forma ascendente por defecto si la opción no es válida
                $query .= " ORDER BY p.precio ASC";
                break;
        }
    
        $productos = DB::select($query, ['cod_subcategoria' => $cod_subcategoria]);
    
        list($categorias, $subcategorias, $productosComunes) = $this->obtenerDatosComunes();
    
        return view('product', compact('categorias', 'subcategorias', 'productos'));
    }
    
    public function index(){
        list($categorias, $subcategorias, $productos) = $this->obtenerDatosComunes();
        return view("welcome", compact('categorias', 'subcategorias', 'productos'));
    }

    public function indexLogin(){
        list($categorias, $subcategorias, $productos) = $this->obtenerDatosComunes();
        return view("login", compact('categorias', 'subcategorias', 'productos'));
    }

    public function indexRegister(){
        list($categorias, $subcategorias, $productos) = $this->obtenerDatosComunes();
        return view("register", compact('categorias', 'subcategorias', 'productos'));
    }

    public function indexContact(){
        list($categorias, $subcategorias, $productos) = $this->obtenerDatosComunes();
        return view("contact", compact('categorias', 'subcategorias', 'productos'));
    }

    public function indexCarshop(){
        list($categorias, $subcategorias, $productos) = $this->obtenerDatosComunes();
        return view("carshop", compact('categorias', 'subcategorias', 'productos'));
    }

    public function indexTicketCompra(){
        list($categorias, $subcategorias, $productos) = $this->obtenerDatosComunes();
        return view("ticket_compra", compact('categorias', 'subcategorias', 'productos'));
    }


    
    
    private function obtenerDatosComunes() {
        $categorias = DB::select("select * from categoria");
        $subcategorias = DB::select("select * from subcategoria");
        $productos = DB::select("select * from producto");
        return [$categorias, $subcategorias, $productos];
    }

    public function actualizarPrecio(Request $request)
    {
        // Obtener el tipo de entrega del formulario
        $deliveryType = $request->input('deliveryType_hidden');
        
        // Obtener el precio total actual de la sesión
        $totalPrice = session('totalPrice');

        // Verificar si el tipo de entrega es "despacho"
        if ($deliveryType === 'retiro') {
            // Agregar $5000 al precio total
            $totalPrice += 5000;
        }

        // Obtener los valores de la dirección de los campos ocultos
        $street = $request->input('street_hidden');
        $city = $request->input('city_hidden');
        $zipcode = $request->input('zipcode_hidden');

        // Guardar los valores de la dirección en la sesión
        session(['street' => $street]);
        session(['city' => $city]);
        session(['zipcode' => $zipcode]);
        session(['deliveryType' => $deliveryType]);

        // Actualizar el precio en la sesión
        session(['totalPrice' => $totalPrice]);

        // Redirigir de vuelta a la página anterior
        return redirect()->back();
    }

    public function compra_transferencia(Request $request) {

        $tipo_delivery = $request->session()->get('deliveryType');
        $calle = $request->session()->get('street');
        $cart = $request->session()->get('cart', []);
        $totalPrice = $request->session()->get('totalPrice', 0);
        $user = Auth::user();

        if ($tipo_delivery == 'retiro') {
            $tipo_delivery = 'Despacho a domicilio';
        } else if ($tipo_delivery == 'despacho') {
            $tipo_delivery = 'Retiro en local';
        }
        

       // Crear nueva compra y guardar en la base de datos
       DB::table('compra')->insert([
        'precio_total' => $totalPrice, // Suponiendo que $totalPrice está definido en tu código
        'tipo_despacho' => $tipo_delivery,
        'tipo_pago' => 'Transferencia',
        'datos_despacho' => $calle, 
        'despachado' => false,
        'usuario' => $user->email,
        'transferencia_pagada' => false,
        'picking' => false,
    ]);

    // Obtener el ID de la última compra insertada
    $compraId = DB::getPdo()->lastInsertId();

    // Guardar los productos y sus cantidades en la tabla de detalles de compra
    foreach ($cart as $item) {
        DB::table('detalles_compra')->insert([
            'id_compra' => $compraId,
            'nombre_producto' => $item['nombre_producto'],
            'cantidad' => $item['quantity']
        ]);
    }

    Mail::send('confirmacion_pago', compact('cart', 'totalPrice', 'user'), function($message) use ($user) {
        $message->to($user->email)
                ->subject('Confirmación de pago');
    });

        // Redirigir a la vista transferencia
        return view('transferencia');
    }
    

    public function mostrarCompras() {
        $compras = DB::table('compra')->where('transferencia_pagada', false)->get();

        return view('contador', ['compras' => $compras]);
    }

    public function mostrarComprasVendedor() {
        $compras = DB::table('compra')->where('despachado', false)->get();

        return view('vendedor', ['compras' => $compras]);
    }



    public function indexVendedor()
    {
        $user = Auth::user();
        if (!empty($user->rol_usuario) && $user->rol_usuario == 'vendedor') {
            // Obtener datos comunes
            list($categorias, $subcategorias, $productos) = $this->obtenerDatosComunes();
            
            // Obtener compras del vendedor
            $compras = DB::table('compra')->where('despachado', false)->get();
            
            // Devolver vista con todos los datos
            return view("vendedor", compact('categorias', 'subcategorias', 'productos', 'compras'));
        } else {
            return redirect('/');
        }
    }

    public function indexBodeguero()
{
    $user = Auth::user();
    if (!empty($user->rol_usuario) && $user->rol_usuario == 'bodeguero') {
        // Obtener datos comunes
        list($categorias, $subcategorias, $productos) = $this->obtenerDatosComunes();
        
        // Realizar la consulta para obtener las compras y sus detalles
        $comprasConDetalles = DB::table('compra')
            ->join('detalles_compra', 'compra.id_compra', '=', 'detalles_compra.id_compra')
            ->select('compra.picking', 'compra.id_compra', 'compra.tipo_despacho', 'compra.datos_despacho', 'detalles_compra.nombre_producto', 'detalles_compra.cantidad')
            ->where('compra.despachado', false)
            ->get();
        
        // Agrupar los resultados en PHP
        $comprasAgrupadas = [];
        foreach ($comprasConDetalles as $detalle) {
            $idCompra = $detalle->id_compra;

            if (!isset($comprasAgrupadas[$idCompra])) {
                $comprasAgrupadas[$idCompra] = [
                    'id_compra' => $idCompra,
                    'tipo_despacho' => $detalle->tipo_despacho,
                    'picking' =>$detalle->picking,
                    'datos_despacho' => $detalle->datos_despacho,
                    'detalles' => []
                ];
            }

            $comprasAgrupadas[$idCompra]['detalles'][] = [
                'nombre_producto' => $detalle->nombre_producto,
                'cantidad' => $detalle->cantidad,
            ];
        }
        
        // Devolver vista con todos los datos
        return view("bodeguero", compact('categorias', 'subcategorias', 'productos', 'comprasAgrupadas'));
    } else {
        return redirect('/');
    }
}

    public function cambiarDespachado(Request $request, $id) {
        DB::table('compra')->where('id_compra', $id)->update(['transferencia_pagada' => true]);

        return redirect()->back()->with('success', 'Compra marcada como despachada correctamente.');
    }

    public function confirmDespacho(Request $request, $id) {
        DB::table('compra')->where('id_compra', $id)->update(['picking' => true]);

        return redirect()->back()->with('success', 'Compra marcada como despachada correctamente.');
    }

    public function cambiarEstado($id)
    {
        DB::table('compra')->where('id_compra', $id)->update(['despachado' => true]);

        return redirect()->back()->with('success', 'Compra marcada como despachada correctamente.');
    }

}
