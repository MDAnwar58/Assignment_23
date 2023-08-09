<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class ExpenseController extends Controller
{
    function index(Request $request)
    {
        if ($request->input('start_date') && $request->input('end_date') && !$request->input('category')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $expenses = Expense::where(function ($query) use ($startDate, $endDate) {
                if ($startDate && $endDate) {
                    $query->whereBetween('date', [$startDate, $endDate]);
                }
            })->latest()->paginate(5);
            $dataDate = "desc";
            $dataAmount = "desc";
        } else if ($request->input('start_date') && $request->input('end_date') && $request->input('category')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $category = $request->input('category');
            $expenses = Expense::where(function ($query) use ($category, $startDate, $endDate) {
                if ($category) {
                    $query->where('category', $category);
                }
                if ($startDate && $endDate) {
                    $query->whereBetween('date', [$startDate, $endDate]);
                }
            })->latest()->paginate(5);
            $dataDate = "desc";
            $dataAmount = "desc";
        } else if ($request->input('category')) {
            $dataDate = "desc";
            $dataAmount = "desc";
            $expenses = Expense::where('category', $request->input('category'))->latest()->paginate(5);
        } else if ($request->Input('date_asc')) {
            $dataDate = "desc";
            $dataAmount = "desc";
            $expenses = Expense::orderBy('date', $request->Input('date_asc'))->paginate(5);
        } else if ($request->Input('date_desc')) {
            $dataDate = "asc";
            $dataAmount = "desc";
            $expenses = Expense::orderBy('date', $request->Input('date_desc'))->paginate(5);
        } else if ($request->Input('amount_asc')) {
            $dataDate = "desc";
            $dataAmount = "desc";
            $expenses = Expense::orderBy('amount', $request->Input('amount_asc'))->paginate(5);
        } else if ($request->Input('amount_desc')) {
            $dataDate = "desc";
            $dataAmount = "asc";
            $expenses = Expense::orderBy('amount', $request->Input('amount_desc'))->paginate(5);
        } else {
            $dataDate = "desc";
            $dataAmount = "desc";
            $expenses = Expense::latest()->paginate(5);
        }
        $categories = Expense::select('category')->get();

        return view('pages.backend.expense.index', compact('expenses', 'categories', 'dataDate', 'dataAmount'));
    }
    function store(Request $request)
    {
        $request->validate([
            'category' => 'required|max:150',
            'amount' => 'required|max:50',
            'date' => 'required',
            'description' => 'required',
        ]);

        $incomes = Income::sum('amount');
        $expenses = Expense::sum('amount');
        if ($incomes > $expenses) {
            if (Auth::check()) {
                $user_id = Auth::user()->id;
                Expense::create([
                    'category' => $request->category,
                    'amount' => $request->amount,
                    'date' => $request->date,
                    'description' => $request->description,
                    'user_id' => $user_id,
                ]);

                return redirect()->back()->with('success', 'Your expense added successfully!');
            } else {
                return redirect()->route('login.page');
            }
        } else {
            return back()->with("error", "Please check your incomes and ensure your expense money's to income money is big");
        }
    }
    function edit(Expense $expense)
    {
        return view('pages.backend.expense.edit', compact('expense'));
    }
    function update(Request $request, Expense $expense)
    {
        $request->validate([
            'category' => 'required|max:150',
            'amount' => 'required|max:50',
            'date' => 'required',
            'description' => 'required',
        ]);

        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $expense->update([
                'category' => $request->category,
                'amount' => $request->amount,
                'date' => $request->date,
                'description' => $request->description,
                'user_id' => $user_id,
            ]);

            return redirect()->route('admin.expense')->with('success', 'Expense has been updated successfully!');
        }
    }

    function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect()->back()->with('success', 'Expense has been deleted successfully!');
    }
}
