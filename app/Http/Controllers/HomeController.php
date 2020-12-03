<?php

namespace App\Http\Controllers;

use App\productos;
use App\marca;
use App\categoria;
use DB;
use Illuminate\Http\Request;
use Redirect,Response;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = categoria::all();
        $marcas = marca::all();
        $productos = productos::all();
        return view('inventario')->with('productos', $productos)->with('nombre', "Inventario")
                                ->with('categorias', $categorias)->with('marcas', $marcas);
    }

    public function categoriaSel($id){
        //Consulta los productos de x categoria
        $categoria = DB::table('categorias')->where('id', $id)->value('nombre');
        $categorias = categoria::all();
        $marcas = marca::all();
        $marca = DB::table('marcas')->where('id', $id)->value('nombre');
        $productos = DB::table('productos')->where('id_categoria', $id)->get();
        return view('inventario')->with('productos', $productos)->with('nombre', $categoria)
                                ->with('categorias', $categorias)->with('marcas', $marcas);
    }

    public function marcaSel($id){
        //Consulta los productos de x marca
        $marca = DB::table('marcas')->where('id', $id)->value('nombre');
        $categorias = categoria::all();
        $marcas = marca::all();
        $productos = DB::table('productos')->where('id_marca', $id)->get();
        return redirect('/inventario')->with('productos', $productos)->with('nombre', $marca)
                                ->with('categorias', $categorias)->with('marcas', $marcas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new productos;
        $producto->nombre = $request->nombre;
        $producto->costo = $request->costo;
        $producto->precio = $request->precio;
        $producto->cantidad = $request->cantidad;
        $producto->id_marca = $request->id_marca;
        $producto->id_categoria = $request->id_categoria;
        $producto->save();
        
        return redirect('/inventario')->with('success', 'Producto registrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto = productos::find($id);
        $producto->nombre = $request->nombre;
        $producto->costo = $request->costo;
        $producto->precio = $request->precio;
        $producto->cantidad = $request->cantidad;

        $producto->save();

        return redirect('/inventario')->with('success', 'Producto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
