<!-- Brand Logo -->
<a href="../index3.html" class="brand-link">
    <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Handyman</span>
</a>
<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ asset('indexhandyman') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-header">Reportes</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cubes"></i>
                    <p>
                        Conservacion
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ asset('verreportes/1431') }}" class="nav-link">
                            <i class="fas fa-clipboard-list nav-icon"></i>
                            <p>Anuncios luminosos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ asset('verreportes/1432') }}" class="nav-link">
                            <i class="fas fa-clipboard-list nav-icon"></i>
                            <p>Alumbrado interior y Exterior</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ asset('verreportes/1434') }}" class="nav-link">
                            <i class="fas fa-clipboard-list nav-icon"></i>
                            <p>Eléctrico</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ asset('verreportes/1435') }}" class="nav-link">
                            <i class="fas fa-clipboard-list nav-icon"></i>
                            <p>Conservación</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ asset('verreportes/1436') }}" class="nav-link">
                            <i class="fas fa-clipboard-list nav-icon"></i>
                            <p>Seguridad</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ asset('verreportes/1437') }}" class="nav-link">
                            <i class="fas fa-clipboard-list nav-icon"></i>
                            <p>ICA</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ asset('verreportes/1438') }}" class="nav-link">
                            <i class="fas fa-clipboard-list nav-icon"></i>
                            <p>Cierre</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cubes"></i>
                    <p>
                        Conservación trimes.
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ asset('verreportes/1433') }}" class="nav-link">
                            <i class="fas fa-clipboard-list nav-icon"></i>
                            <p>Electrico</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
