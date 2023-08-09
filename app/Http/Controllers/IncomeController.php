<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    function index(Request $request)
    {
        if($request->input('start_date') && $request->input('end_date') && !$request->input('category')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $incomes = Income::where(function ($query) use ($startDate, $endDate) {
                if ($startDate && $endDate) {
                    $query->whereBetween('date', [$startDate, $endDate]);
                }
            })->latest()->paginate(5);
            $dataDate = "desc";
            $dataAmount = "desc";
        }else if ($request->input('start_date') && $request->input('end_date') && $request->input('category')) {
            // return "date";
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $category = $request->input('category');
            $incomes = Income::where(function ($query) use ($category, $startDate, $endDate) {
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
            $incomes = Income::where('category', $request->input('category'))->latest()->paginate(5);
        } else if ($request->Input('date_asc')) {
            $dataDate = "desc";
            $dataAmount = "desc";
            $incomes = Income::orderBy('date', $request->Input('date_asc'))->paginate(5);
        } else if ($request->Input('date_desc')) {
            $dataDate = "asc";
            $dataAmount = "desc";
            $incomes = Income::orderBy('date', $request->Input('date_desc'))->paginate(5);
        } else if ($request->Input('amount_asc')) {
            $dataDate = "desc";
            $dataAmount = "desc";
            $incomes = Income::orderBy('amount', $request->Input('amount_asc'))->paginate(5);
        }  else if ($request->Input('amount_desc')) {
            $dataDate = "desc";
            $dataAmount = "asc";
            $incomes = Income::orderBy('amount', $request->Input('amount_desc'))->paginate(5);
        } else {
            $dataDate = "desc";
            $dataAmount = "desc";
            $incomes = Income::latest()->paginate(5);
        }
        $categories = Income::select('category')->get();
        return view('pages.backend.income.index', compact('incomes', 'categories', 'dataDate', 'dataAmount'));
    }
    function store(Request $request)
    {
        $request->validate([
            'category' => 'required|max:150',
            'amount' => 'required|max:50',
            'date' => 'required',
            'description' => 'required',
        ]);

        if (Auth::check()) {
            $user_id = Auth::user()->id;
            Income::create([
                'category' => $request->category,
                'amount' => $request->amount,
                'date' => $request->date,
                'description' => $request->description,
                'user_id' => $user_id,
            ]);

            return redirect()->back()->with('success', 'Your income added successfully!');
        }else{
            return redirect()->route('login.page');
        }
    }
    function edit(Income $income)
    {
        return view('pages.backend.income.edit', compact('income'));
    }
    function update(Request $request, Income $income)
    {
        $request->validate([
            'category' => 'required|max:150',
            'amount' => 'required|max:50',
            'date' => 'required',
            'description' => 'required',
        ]);

        if(Auth::check())
        {
            $user_id = Auth::user()->id;
            $income->update([
                'category' => $request->category,
                'amount' => $request->amount,
                'date' => $request->date,
                'description' => $request->description,
                'user_id' => $user_id,
            ]);

            return redirect()->route('admin.income')->with('success', 'Income has been updated successfully!');
        }
    }

    function destroy(Income $income)
    {
        $income->delete();

        return redirect()->back()->with('success', 'Income has been deleted successfully!');
    }
}
