@extends('app')

@section('title', 'Dashboard')

@section('content')
    <h1>Welcome to Dashboard</h1>
    <p>You are logged in as </p>
    <a href="{{ route('check.serial') }}"><button class="btn btn-outline-secondary">View Site</button></a>
@endsection