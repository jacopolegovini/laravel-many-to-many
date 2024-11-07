@extends('layouts.app')

@section('content')
<main class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('admin.projects.update', $projects->id)}}" method="POST">
        @csrf
        @method('PUT')
            <h1 class="mb-3">
                Creating a new Project:
            </h1>
            <div class="mb-3">
                {{-- Implementato una validazione manuale per cancellare la risposta sbagliata e lasciare esclusivamente quelle corrette --}}
                <label for="project-title" class="form-label">Titolo:</label>
                <input type="text" class="form-control" id="project-title" name="title" value="{{$projects->title}}">
            </div>
            <div class="mb-3">
                <label for="project-author" class="form-label">Author:</label>
                <input type="text" class="form-control" id="author" name="author" value="{{$projects->author}}">
            </div>
            <div class="mb-3">
                <label for="project-date" class="form-label">Date:</label>
                <input type="text" class="form-control" id="date" name="date" value="{{$projects->date}}">
            </div>
            <div class="mb-3">
                <label for="project-description" class="form-label">Description:</label>
                <input type="text" class="form-control" id="project-description" name="description" value="{{$projects->description}}">
            </div>

            <div class="mb-3 d-flex justify-content-center align-items-center">
                <button type="submit" class="btn btn-primary me-3">
                    Edit
                </button>
                <button type="reset" class="btn btn-warning me-3">
                    Reset fields
                </button>
            </div>
    </form>
</main>
@endsection
