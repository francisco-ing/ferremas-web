<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


    public function deleteProductFromCart($cod_producto){
        $cart = session()->get('cart', []);

        if(isset($cart[$cod_producto])){
            if($cart[$cod_producto]['quantity'] > 1){
                $cart[$cod_producto]['quantity']--;
            }else{
                unset($cart[$cod_producto]);
            }
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Se eliminó un producto del carrito.');
        }else{
            return redirect()->back()->with('error', 'El producto no existe en el carrito.');
        }
    }
    
    

    public function addProducttoCart($cod_producto){
        
        $product = DB::table('Producto')->where('cod_producto', $cod_producto)->first();
        $cart = session()->get('cart', []);

        if(isset($cart{$cod_producto})){
            $cart[$cod_producto]['quantity']++;
        }else {
            $cart[$cod_producto] = [
                "nombre_producto" => $product->nombre_producto,
                "quantity" => 1,
                "precio" => $product->precio,
                "marca" => $product->marca,
            ];
        }
        session()->put('cart', $cart);
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
    
    private function obtenerDatosComunes() {
        $categorias = DB::select("select * from categoria");
        $subcategorias = DB::select("select * from subcategoria");
        $productos = DB::select("select * from producto");
        return [$categorias, $subcategorias, $productos];
    }
    
}