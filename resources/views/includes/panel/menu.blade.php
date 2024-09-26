<!-- Heading -->
<h6 class="navbar-heading text-muted">Home</h6>
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
            <i class="fas fa-sign-in-alt"></i> Cerrar sesión
        </a>
        <form action="{{route('logout')}}" method="POST" style="display: none;" id="formLogout">
            @csrf
        </form>
    </li>
</ul>
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<!-- Botón para desplegar el menú con la flecha -->
<a class="nav-link d-flex align-items-center" data-bs-toggle="collapse" href="#listasSubmenu" role="button" aria-expanded="false" aria-controls="listasSubmenu">
    </i> <h6 class="navbar-heading text-muted">Listas</h6>
    <i class="fas fa-chevron-down ms-auto me-2"></i> <!-- Flecha hacia abajo -->
</a>

<!-- Menú desplegable -->
<div class="collapse" id="listasSubmenu">
    <ul class="navbar-nav mb-md-3">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="ni ni-spaceship"></i> Empleados
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="ni ni-palette"></i> Cargos
            </a>
        </li>
    </ul>
</div>