@extends('layouts.app')
@section('title', 'Welcome')

@section('content')
<div class="container">
    <h1>Welcome this site you want to access income and expense admin panel <a href="{{ route('admin.dashboard') }}">click here</a></h1>
</div>
@endsection