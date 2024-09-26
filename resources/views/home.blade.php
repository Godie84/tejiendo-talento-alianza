@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-md-12 mb-4">
    <div class="card">
      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif

        {{ __('You are logged in!') }}
      </div>
      <!-- Botón para ir a la página de creación de empleados -->
    <a href="{{ route('empleados.create') }}" class="btn btn-primary">Crear Empleado</a>
    </div>
  </div>
</div>
@endsection