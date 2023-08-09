<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $total_income = Income::sum('amount');
        $total_expense = Expense::sum('amount');
        return view('pages.backend.dashboard.index', compact('total_income', 'total_expense'));
    }
}
