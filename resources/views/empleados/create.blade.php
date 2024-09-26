@extends('layouts.panel')

@section('content')
<div class="container">
    <h1>Crear Empleado</h1>

    <!-- Mostrar errores de validación -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Formulario de creación de empleado -->
    <form action="{{ route('empleados.store') }}" method="POST">
        @csrf

        <!-- Campo Nombres -->
        <div class="mb-3">
            <label for="nombres" class="form-label">Nombres</label>
            <input type="text" name="nombres" class="form-control" id="nombres" value="{{ old('nombres') }}" required>
        </div>

        <!-- Campo Apellidos -->
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" name="apellidos" class="form-control" id="apellidos" value="{{ old('apellidos') }}" required>
        </div>

        <!-- Campo Identificación -->
        <div class="mb-3">
            <label for="identificacion" class="form-label">Identificación</label>
            <input type="text" name="identificacion" class="form-control" id="identificacion" value="{{ old('identificacion') }}" required>
        </div>

        <!-- Campo Dirección -->
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control" id="direccion" value="{{ old('direccion') }}" required>
        </div>

        <!-- Campo Teléfono -->
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" id="telefono" value="{{ old('telefono') }}" required>
        </div>

        <!-- Selector País -->
        <div class="mb-3">
            <label for="pais_id" class="form-label">País de Nacimiento</label>
            <select name="pais_id" id="pais_id" class="form-select" required>
                <option value="" disabled selected>Seleccione un país</option>
                @foreach($paises as $pais)
                <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                @endforeach
            </select>
        </div>

        <!-- Selector Ciudad -->
        <div class="mb-3">
            <label for="ciudad_id" class="form-label">Ciudad de Nacimiento</label>
            <select name="ciudad_id" id="ciudad_id" class="form-select" required>
                <option value="" disabled selected>Seleccione una ciudad</option>
                <!-- Las ciudades deben cargarse dinámicamente con JavaScript cuando se seleccione un país -->
            </select>
        </div>

        <script>
            document.getElementById('pais_id').addEventListener('change', function() {
                var paisId = this.value;
                var ciudadSelect = document.getElementById('ciudad_id');
                ciudadSelect.innerHTML = ''; // Limpiar las ciudades existentes

                if (paisId) {
                    fetch(`/api/ciudades/${paisId}`)
                        .then(response => response.json())
                        .then(data => {
                            ciudadSelect.innerHTML = '<option value="" disabled selected>Seleccione una ciudad</option>';
                            data.ciudades.forEach(ciudad => {
                                ciudadSelect.innerHTML += `<option value="${ciudad.id}">${ciudad.nombre}</option>`;
                            });
                        });
                }
            });
        </script>

        <form action="{{ route('empleados.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="cargos" class="form-label">Cargos</label>
                <select name="cargos[]" id="cargos" class="form-select" multiple required>
                    @foreach($cargos as $cargo)
                    <option value="{{ $cargo->id }}">{{ $cargo->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Botón para enviar el formulario -->
            <button type="submit" class="btn btn-primary">Crear Empleado</button>
        </form>
</div>


@endsection