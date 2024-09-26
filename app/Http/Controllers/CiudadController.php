<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    public function getCiudadesPorPais($paisId)
    {
        // Obtener las ciudades correspondientes al país seleccionado
        $ciudades = Ciudad::where('pais_id', $paisId)->get();

        // Devolver las ciudades en formato JSON
        return response()->json([
            'ciudades' => $ciudades
        ]);
    }
}
