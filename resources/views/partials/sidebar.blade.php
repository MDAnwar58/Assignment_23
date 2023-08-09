<ul class="nav flex-column mt-md-5 d-md-block d-none">
    <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
            <i class="bi bi-speedometer pe-1"></i>
            Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.income') ? 'active' : '' }} {{ Route::is('admin.income.edit') ? 'active' : '' }}" href="{{ route('admin.income') }}">
            <i class="bi bi-graph-up pe-1"></i>
            Incomes
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.expense') ? 'active' : '' }} {{ Route::is('admin.expense.edit') ? 'active' : '' }}" href="{{ route('admin.expense') }}">
            <i class="bi bi-graph-down pe-1"></i>  
            Expenses
        </a>
    </li>
</ul>
