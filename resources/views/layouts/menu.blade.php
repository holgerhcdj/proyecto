@if(Auth::user()->per_tipo=='A')

<li class="nav-item {{ Request::is('tipos*') ? 'active' : '' }}" >
    <a class="nav-link" href="{{ route('tipos.index') }}" style="color:#0295A6;" >
        <i class="nav-icon fa fa-list "></i>
        <span>Tipos</span>
    </a>
</li>

    
<li class="nav-item {{ Request::is('productos*') ? 'active' : '' }}" style="color:#0295A6;">
    <a class="nav-link" href="{{ route('productos.index') }}" style="color:#0295A6;">
        <i class="nav-icon fa fa-product-hunt"></i>
        <span>Productos</span>
    </a>
</li>

<li class="nav-item {{ Request::is('almaneces*') ? 'active' : '' }}" style="color:#0295A6;">
    <a class="nav-link" href="{{ route('almaneces.index') }}" style="color:#0295A6;">
        <i class="nav-icon fa fa-home"></i>
        <span>Almacen</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('personas.index') }}" style="color:#0295A6;">
        <i class="nav-icon fa fa-user"></i>
        <span>Usuarios/Clientes</span>
    </a>
</li>

<li class="nav-item {{ Request::is('facturas*') ? 'active' : '' }}" style="color:#0295A6;">
    <a class="nav-link" href="{{ route('facturas.index') }}" style="color:#0295A6;">
        <i class="nav-icon fa fa-book"></i>
        <span>Ventas</span>
    </a>
</li>


@endif

@if(Auth::user()->per_tipo=='V')
<li class="nav-item">
    <a class="nav-link" href="{{ route('personas.index') }}" style="color:#0295A6;">
        <i class="nav-icon icon-cursor"></i>
        <span>Clientes</span>
    </a>
</li>

<li class="nav-item {{ Request::is('facturas*') ? 'active' : '' }}" style="color:#0295A6;">
    <a class="nav-link" href="{{ route('facturas.index') }}" style="color:#0295A6;">
        <i class="nav-icon icon-cursor"></i>
        <span>Ventas</span>
    </a>
</li>
    
@endif
