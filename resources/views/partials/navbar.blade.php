<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item d-lg-none d-block">
                    <a class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-speedometer pe-1"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item d-lg-none d-block">
                    <a class="nav-link {{ Route::is('admin.income') ? 'active' : '' }} {{ Route::is('admin.income.edit') ? 'active' : '' }}" href="{{ route('admin.income') }}">
                        <i class="bi bi-graph-up pe-1"></i>
                        Incomes
                    </a>
                </li>
                <li class="nav-item d-lg-none d-block">
                    <a class="nav-link {{ Route::is('admin.expense') ? 'active' : '' }} {{ Route::is('admin.expense.edit') ? 'active' : '' }}" href="{{ route('admin.expense') }}">
                        <i class="bi bi-graph-down pe-1"></i>  
                        Expenses
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ Auth::check() ? Auth::user()->name : '' }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
