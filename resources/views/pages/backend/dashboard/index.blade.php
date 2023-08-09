@extends('layouts.backend')
@section('title', 'Dashboard')

@section('content')
    <div class="container dashboard">
        <div class="row pt-4">
            <div class="col-md-4 mb-md-0 mb-3">
                <div class="card card-body bg-info rounded-0 text-light">
                    <div class="d-flex justify-content-between">
                        <div class="pt-3">
                            <h3>{{ $total_income }} TK</h2>
                                <p>Current Income This Month</p>
                        </div>
                        <div class="icon">
                            <img src="{{ url('images/money-income.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-md-0 mb-3">
                <div class="card card-body bg-danger rounded-0 text-light">
                    <div class="d-flex justify-content-between">
                        <div class="pt-3">
                            <h3>{{ $total_expense }} TK</h2>
                                <p>Current Expense This Month</p>
                        </div>
                        <div class="icon">
                            <img src="{{ url('images/money-expense.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-body bg-success rounded-0 text-light">
                    <div class="d-flex justify-content-between">
                        <div class="pt-3">
                            <h3>{{ $total_income - $total_expense }} TK</h3>
                            <p>Your Current Net Incomes</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-sort-up"></i>
                            {{-- <i class="bi bi-sort-down"></i> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
