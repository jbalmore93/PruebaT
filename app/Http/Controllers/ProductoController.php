<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
   //Reglas de Validaciones
    protected $rules = [
        'nombre_pro'      => 'required|string|max:25',
        'descripcion_pro' => 'required|string|max:50',
        'precio_pro'      => 'required|numeric',
        'cat_id'          => 'required|numeric',
    ];

    public function index()
    {
        $categoria = Categoria::query()->select(['id_cat','nombre_cat'])->get();
        $productos = Producto::all();
        $editar = false;
        return view('Sistema.Productos.index',compact(['productos','categoria','editar']));

    }

    public function store(Request $request)
    {
            $validar = $request->validate($this->rules);
            $producto = Producto::create($validar);
            $categoria = Categoria::find($validar['cat_id']);
            return response()->json($producto, 200);
    }

    public function buscar(Request $request)
{
    $query = $request->get('query');

    // Realizar la búsqueda de productos según la consulta
    $productos = Producto::where('nombre_pro', 'like', '%'.$query.'%')->get();

    return view('Sistema.Productos.index', compact('productos'));
}

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        $editar = true; // Establecer $editar en true para mostrar el modal de edición
        $categoria = Categoria::all(); // Obtener todas las categorías para el formulario de edición
        return view('Sistema.Productos.editar', compact('producto', 'categoria', 'editar'));
    }


     public function update(Request $request, Producto $producto)
{
    $validar = $request->validate($this->rules);
    Producto::find($producto)->update($validar);
    return response()->json(['actializado'], 200);
}

public function destroy(Producto $producto)
{
    $producto->delete();

    return response()->json(['message' => 'Producto eliminado correctamente'], 200);
}
}
