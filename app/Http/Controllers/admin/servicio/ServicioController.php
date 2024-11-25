<?php

namespace App\Http\Controllers\Admin\Servicio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\servicios;

class ServicioController extends Controller
{
    public function listarServicios(Request $request)
    {
       $estado = $request->input('estado');

       if ($estado) {
            $servicios = servicios::where('estado', $estado)->orderBy('id', 'desc')->paginate(10);
        } else {
            $servicios = servicios::orderBy('id', 'desc')->paginate(10);
        }

       return response()->json($servicios);
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'estado' => 'required|string|in:activo,inactivo',
        ]);

         Servicios::create($request->all());

        return response()->json(['message' => 'Servicio creado correctamente', 'status' => 'success'], 201);
    }

    public function show($id)
    {
        $servicio = Servicios::find($id);
        return response()->json($servicio);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'estado' => 'required'
        ]);

        $servicio = Servicios::find($id);
        $servicio->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'estado' => $request->estado
        ]);
        
        return response()->json([
            'status' => 'success',
            'message' => 'Servicio actualizado correctamente'
        ]);
    }

    public function destroy($id)
    {
        $servicio = Servicios::find($id);
        $servicio->delete();
        return response()->json(['message' => 'Servicio eliminado correctamente', 'status' => 'success']);
    }

    
}
