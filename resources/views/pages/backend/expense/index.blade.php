@extends('layouts.backend')
@section('title', 'Expenses')

@section('content')
    @include('components.expense-table')
@endsection

@include('components.expense-added-form-modal')
