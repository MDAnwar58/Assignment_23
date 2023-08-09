@extends('layouts.backend')
@section('title', 'Expenses')

@section('content')
    @include('components.income-table')
@endsection

@include('components.income-added-form-modal')
