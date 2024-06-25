@extends('layouts.admin')

@section('content')
    <div class="container mt-5">

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif


        <h2>Titolo {{ $project->id }}:</h2>
        <h3>{{ $project->title }}</h3>
        <p class="{{ $project->category->color }}">Categoria: {{ $project->category?->name }}</p>
        <hr>
        <h5>Descrizione:</h5>
        <p>{{ $project->description }}</p>
        <hr>
        <h5>Slug</h5>
        <p>{{ $project->slug }}</p>
        <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">Indietro</a>
    </div>
@endsection
