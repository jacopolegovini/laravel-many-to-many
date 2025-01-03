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
    <form action="{{route('admin.tasks.store')}}" method="POST">
        @csrf

            <h1 class="mb-3">
                Creating a new Task:
            </h1>
            <div class="mb-3">
                {{-- Implementato una validazione manuale per cancellare la risposta sbagliata e lasciare esclusivamente quelle corrette --}}
                <label for="task-title" class="form-label">Titolo:</label>
                <input type="text" class="form-control" id="task-title" name="title" value="{{(strlen(old('title')) >= 3) ? old('title') : ""}}">
            </div>
            <div class="mb-3">
                <label for="task-author" class="form-label">Author:</label>
                <input type="text" class="form-control" id="author" name="author" value="{{old('author')}}">
            </div>
            <div class="mb-3">
                <label for="task-date" class="form-label">Date:</label>
                <input type="text" class="form-control" id="date" name="date" value="{{old('date')}}">
            </div>
            <div class="mb-3">
                <label for="task-priority" class="form-label">Priority:</label>
                <select class="form-select" aria-label="Default select example" id="task-priority" name="priority" value="{{old('priority')}}">
                    <option selected></option>
                    <option value="Alta">Alta</option>
                    <option value="Media">Media</option>
                    <option value="Bassa">Bassa</option>
                  </select>
            </div>
            <div class="mb-3">
                <label for="task-description" class="form-label">Description:</label>
                <input type="text" class="form-control" id="task-description" name="description" value="{{old('description')}}">
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
