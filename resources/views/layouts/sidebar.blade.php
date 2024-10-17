<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{url('images/logo.png')}}"
             alt="{{ config('app.name') }} Logo"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
                <li class="nav-item">
                    <a href="/" class="nav-link " target="_blank">
                        <i class="nav-icon fas fa-globe-asia"></i>
                        <p><strong>Visit site</strong></p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>


</aside>
