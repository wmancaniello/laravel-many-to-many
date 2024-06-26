@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <h1>Inserisci un nuovo progetto</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ $project->title }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Seleziona categoria</label>
                <select class="form-select" name="category_id" id="category">
                    <option value="">Seleziona</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    rows="3">{{ $project->description }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- SELEZIONA TECHNO --}}
            <div class="mb-3">
                <h4>Seleziona Tech:</h4>
                <ul class="list-group">
                    @foreach ($technologies as $technology)
                        <li class="list-group-item">

                            <input @checked(in_array($technologies->id, old('technologies, []'))) name="technologies[]" class="form-check-input me-1"
                                type="checkbox" value="{{ $technology->id }}" id="technology-{{ $technology->id }}">

                            <label class="form-check-label" for="technology-{{ $technology->id }}">
                                {{ $technology->name }}
                            </label>

                        </li>
                    @endforeach
                </ul>
            </div>

            <button class="btn btn-success" type="submit">Salva</button>
            <a class="btn btn-danger" href="{{ route('admin.projects.index') }}">Indietro</a>
        </form>
    </div>
@endsection
