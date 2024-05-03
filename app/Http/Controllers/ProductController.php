<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function mostrarProductos() {
        $cod_subcategoria = request()->query('cod_subcategoria');
        $productos = DB::select("
            SELECT *
            FROM producto p
            INNER JOIN subcategoria s ON p.cod_subcategoria = s.cod_subcategoria
            INNER JOIN categoria c ON s.cod_categoria = c.cod_categoria
            WHERE p.cod_subcategoria = :cod_subcategoria
        ", [
            'cod_subcategoria' => $cod_subcategoria,
        ]);
    
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
