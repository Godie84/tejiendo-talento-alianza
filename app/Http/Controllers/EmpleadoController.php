<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Cargo;
use App\Models\Pais;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::with('cargos')->get();
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = Cargo::all();
        $paises = Pais::all();
        return view('empleados.create', compact('cargos', 'paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'identificacion' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'pais_id' => 'required|exists:paises,id',
            'ciudad_id' => 'required|exists:ciudades,id',
            'cargos' => 'required|array',
            'cargos.*' => 'exists:cargos,id',
        ]);

        $empleado = Empleado::create($request->all());
        $empleado->cargos()->sync($request->cargos);
        return redirect()->route('empleados.index')->with('success', 'Empleado creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::with('cargos')->findOrFail($id);
        $cargos = Cargo::all();
        $paises = Pais::all();
        return view('empleados.show', compact('empleado', 'cargos', 'paises'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::with('cargos')->findOrFail($id);
        $cargos = Cargo::all();
        $paises = Pais::all();
        return view('empleados.edit', compact('empleado', 'cargos', 'paises'));
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
        $empleado = Empleado::findOrFail($id);
        $empleado->update($request->all());
        $empleado->cargos()->sync($request->cargos);
        return redirect()->route('empleados.index');
    }

    /**
     * Remove the specified resource from storage (logical delete).
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        // Borrado lógico
        $empleado->activo = false;
        $empleado->save();
        return redirect()->route('empleados.index');
    }
}
