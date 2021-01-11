<aside class="main-sidebar sidebar-dark-primary elevation-4">
    @include('components.logo')

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- {{dd(Auth::user()->role_id)}} --}}
                @if (Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ $active == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header"></li>
                <li class="nav-item">
                    <a href="{{ route('adminMaterial.index') }}"
                        class="nav-link {{ $active == 'material.index' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Material
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('adminPemakaian.index') }}"
                        class="nav-link {{ $active == 'pemakaian.index' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Pemakaian
                        </p>
                    </a>
                </li>
                <li class="nav-header"></li>
                <li class="nav-item">
                    <a href="{{ route('mandor.index') }}"
                        class="nav-link {{ $active == 'mandor.index' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Mandor
                        </p>
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('mandor.dashboard') }}"
                        class="nav-link {{ $active == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header"></li>
                <li class="nav-item">
                    <a href="{{ route('material.index') }}"
                        class="nav-link {{ $active == 'material.index' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Material
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pemakaian.index') }}"
                        class="nav-link {{ $active == 'pemakaian.index' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Pemakaian
                        </p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
