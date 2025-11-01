@extends('layouts.instituicao')

@section('title', 'Dashboard')

@section('content')

<div class="dashboard-header">
    <h1>Dashboard</h1>
    <p>Bem-vindo, {{ Auth::user()->nome ?? 'Instituição' }}!</p>
</div>

@endsection
