<aside class="app-sidebar">
    <div class="sidebar-brand">
        <img src="{{ asset('images/admin/logo.svg') }}" alt="Te Juego una Pichanga" class="brand-image">
        <p class="brand-text">Te Juego una Pichanga</p>
    </div>
    <div class="sidebar-user">
        <img src="{{ asset('images/admin/user.svg') }}" alt class="user-avatar">
        <p class="user-name">{{ Auth::user()->name }}</p>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview">
                <li class="nav-item active">
                    <a href="{{ route('panel.home') }}" class="nav-link {{ Route::current()->getName() == 'panel.home' ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-house"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                @if (array_search(Auth::user()->role, ['dummy','admin','mod','data']))
                <li class="nav-item">
                    <a href="{{ route('panel.companies') }}" class="nav-link {{ Route::current()->getName() == 'panel.companies' || Route::current()->getName() == 'panel.companies.crud' || Route::current()->getName() == 'panel.companies.field' ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-building"></i>
                        <p>Empresas</p>
                    </a>
                </li>
                @endif
                @if (array_search(Auth::user()->role, ['dummy','admin','mod']))
                <li class="nav-item">
                    <a href="{{ route('panel.users') }}" class="nav-link {{ Route::current()->getName() == 'panel.users' || Route::current()->getName() == 'panel.users.crud' ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>Clientes</p>
                    </a>
                </li>
                @endif
                @if (array_search(Auth::user()->role, ['dummy','admin','mod','data']))
                <li class="nav-item">
                    <a href="{{ route('panel.bookings') }}" class="nav-link {{ Route::current()->getName() == 'panel.bookings' ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-clipboard-list"></i>
                        <p>Reservas</p>
                    </a>
                </li>
                @endif
                @if (array_search(Auth::user()->role, ['dummy','admin']))
                <li class="nav-item">
                    <a href="{{ route('panel.admins') }}" class="nav-link {{ Route::current()->getName() == 'panel.admins' || Route::current()->getName() == 'panel.admins.crud' ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-user-tie"></i>
                        <p>Administradores</p>
                    </a>
                </li>
                @endif
                @if (array_search(Auth::user()->role, ['dummy','admin','mod']))
                <li class="nav-item">
                    <a href="{{ route('panel.comments') }}" class="nav-link {{ Route::current()->getName() == 'panel.comments' || Route::current()->getName() == 'panel.comments.crud' ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-list"></i>
                        <p>Comentarios</p>
                    </a>
                </li>
                @endif
                @if (array_search(Auth::user()->role, ['dummy','admin']))
                <li class="nav-item {{ request()->segment(2) == 'config' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->segment(2) == 'config' ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-cog"></i>
                        <p>Config.<i class="nav-arrow fa-solid fa-angle-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('panel.config.contact') }}" class="nav-link {{ Route::current()->getName() == 'panel.config.contact' ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-phone-volume"></i>
                                <p>Contacto</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('panel.config.terms') }}" class="nav-link {{ Route::current()->getName() == 'panel.config.terms' ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-file-signature"></i>
                                <p>Términos y Cond.</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('panel.config.privacy') }}" class="nav-link {{ Route::current()->getName() == 'panel.config.privacy' ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-file-signature"></i>
                                <p>Polit. Privacidad</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </nav>
    </div>
  </aside>
