<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductApiController extends Controller
{

    public function index()
    {
        $products = DB::table('producto')->get();
        return response()->json($products);
    }

    public function show($id)
    {
        $product = DB::table('producto')->where('cod_producto', $id)->first();

        if ($product) {
            return response()->json($product);
        }

        return response()->json(['message' => 'Product not found'], 404);
    }

    public function store()
    {
        $request->validate([
            'cod_producto' => 'sometimes|required|integer',
            'nombre_producto' => 'sometimes|required|string|max:50',
            'marca' => 'sometimes|nullable|string|max:50',
            'precio' => 'sometimes|required|numeric',
            'stock' => 'sometimes|nullable|integer',
            'cod_subcategoria' => 'sometimes|nullable|integer',
            'destacado' => 'sometimes|nullable|boolean',
            'imagen_producto' => 'sometimes|nullable|string|max:255',
        ]);
  
        $id = DB::table('producto')->insertGetId([
            'cod_producto' => $request->cod_producto,
            'nombre_producto' => $request->nombre_producto,
            'marca' => $request->marca,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'cod_subcategoria' => $request->cod_subcategoria,
            'destacado' => $request->destacado,
            'imagen_producto' => $request->imagen_producto,
        ]);
    
        $producto = DB::table('producto')->where('cod_producto', $id)->last();
        return response()->json($producto, 200);
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_producto' => 'sometimes|nullable|string|max:50',
            'marca' => 'sometimes|nullable|string|max:50',
            'precio' => 'sometimes|nullable|numeric',
            'stock' => 'sometimes|nullable|integer',
            'cod_subcategoria' => 'sometimes|nullable|integer',
            'destacado' => 'sometimes|nullable|boolean',
            'imagen_producto' => 'sometimes|nullable|string|max:255',
        ]);
    
        $updated = DB::table('producto')->where('cod_producto', $id)->update([
            'nombre_producto' => $request->nombre_producto ?? DB::raw('nombre_producto'),
            'marca' => $request->marca ?? DB::raw('marca'),
            'precio' => $request->precio ?? DB::raw('precio'),
            'stock' => $request->stock ?? DB::raw('stock'),
            'cod_subcategoria' => $request->cod_subcategoria ?? DB::raw('cod_subcategoria'),
            'destacado' => $request->destacado ?? DB::raw('destacado'),
            'imagen_producto' => $request->imagen_producto ?? DB::raw('imagen_producto'),
            'updated_at' => now(),
        ]);
    
        if ($updated) {
            $product = DB::table('producto')->where('cod_producto', $id)->first();
            return response()->json($producto);
        }
    
        return response()->json(['message' => 'Product not found'], 404);
    }
    
    public function destroy($id)
    {
        $deleted = DB::table('producto')->where('cod_producto', $id)->delete();

        if ($deleted) {
            return response()->json(['message' => 'Product deleted successfully']);
        }
        return response()->json(['message' => 'Product not found'], 404);
    }
}
