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
    <form action="{{route('admin.projects.store')}}" method="POST">
        @csrf

            <h1 class="mb-3">
                Creating a new Project:
            </h1>
            <div class="mb-3">
                {{-- Implementato una validazione manuale per cancellare la risposta sbagliata e lasciare esclusivamente quelle corrette --}}
                <label for="project-title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="project-title" name="title" value="{{(strlen(old('title')) >= 3) ? old('title') : ""}}">
            </div>
            <div class="mb-3">
                <label for="project-type" class="form-label">Type:</label>
                <select class="form-control" id="type_id" name="type_id" value="{{old('type')}}">
                    <option value=""></option>
                    @foreach ($types as $type)
                    <option value="{{$type->id}}">{{$type->type}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="project-author" class="form-label">Author:</label>
                <input type="text" class="form-control" id="author" name="author" value="{{old('author')}}">
            </div>
            <div class="mb-3">
                <label for="project-date" class="form-label">Date:</label>
                <input type="text" class="form-control" id="date" name="date" value="{{old('date')}}">
            </div>
            <div class="mb-3">
                <label for="project-description" class="form-label">Description:</label>
                <input type="text" class="form-control" id="project-description" name="description" value="{{old('description')}}">
            </div>

            <div class="mb-3 d-flex justify-content-center align-items-center">
                <button type="submit" class="btn btn-primary me-3">
                    Create
                </button>
                <button type="reset" class="btn btn-warning me-3">
                    Reset fields
                </button>
            </div>
    </form>
</main>
@endsection
