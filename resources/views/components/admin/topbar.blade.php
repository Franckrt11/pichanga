<nav class="app-header navbar navbar-expand">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                        <x-admin.icons.points class="link-icon" />
                    </a>
                </li>
            </ul>
            <span class="navbar-text d-none d-sm-flex">
                <p class="mb-0">Oculta el menú lateral izquierdo presionando el botón</p>
                <x-admin.icons.points class="text-icon" />
            </span>
            <form class="navbar-form ms-auto" method="POST" action="{{ route('panel.logout') }}">
                @csrf
                <button class="btn btn-exit" type="submit">
                    <p class="mb-0">SALIR</p>
                    <img src="{{ asset('images/admin/exit.svg') }}" class="btn-icon" alt>
                </button>
            </form>
        </div>
    </div>
</nav>
