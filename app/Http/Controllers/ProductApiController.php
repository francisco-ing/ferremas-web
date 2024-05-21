<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductApiController extends Controller
{
    // Obtener todos los productos
    public function index()
    {
        $producto = DB::table('producto')->get();
        return response()->json($producto, 200);
    }

    // Obtener un producto específico
    public function show($id)
    {
        $producto = DB::table('producto')->where('cod_producto', $id)->first();
        if (is_null($producto)) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
        return response()->json($producto, 200);
    }

    // Crear un nuevo producto
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_producto' => 'required|string|max:50',
            'marca' => 'required|string|max:50',
            'precio' => 'required|integer',
            'stock' => 'required|integer',
            'cod_subcategoria' => 'required|integer',
            'destacado' => 'required|boolean',
            'imagen_producto' => 'required|string|max:255',
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

        $producto = DB::table('producto')->where('cod_producto', $id)->first();
        return response()->json($producto, 201);
    }

    // Actualizar un producto existente
    public function update(Request $request, $id)
    {
        $product = DB::table('producto')->where('cod_producto', $id)->first();
        if (is_null($product)) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'nombre_producto' => 'sometimes|string|max:50',
            'marca' => 'sometimes|string|max:50',
            'precio' => 'sometimes|integer',
            'stock' => 'sometimes|integer',
            'cod_subcategoria' => 'sometimes|integer',
            'destacado' => 'sometimes|boolean',
            'imagen_producto' => 'sometimes|string|max:255',
        ]);

        DB::table('producto')
            ->where('cod_producto', $id)
            ->update(array_merge($validatedData, [
                'updated_at' => now(),
            ]));

        $updatedProduct = DB::table('producto')->where('cod_producto', $id)->first();
        return response()->json($updatedProduct, 200);
    }

    // Eliminar un producto
    public function destroy($id)
    {
        $producto = DB::table('producto')->where('cod_producto', $id)->first();
        if (is_null($producto)) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        DB::table('producto')->where('cod_producto', $id)->delete();
        return response()->json(null, 204);
    }
}
