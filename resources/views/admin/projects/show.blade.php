@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center">
    <div class="card" style="width: 20rem;">
        <div class="card-body">
            <h5 class="card-title">{{$projects->title}} | {{$projects->type->type}}</h5>
            <img width="300px" src="{{asset("/storage/" . $projects->img)}}" alt="{{$projects->title}}">
            <h6 class="card-subtitle mb-2 text-body-secondary">{{$projects->date}}</h6>
            <p class="card-text">{{$projects->description}}</p>
            <ul>
                @foreach ($projects->technologies as $technology)
                <li>
                    {{$technology->name}}
                </li>
                @endforeach
            </ul>

            <a href="{{route('welcome.index')}}" class="card-link">Go Back</a>
        </div>
    </div>
</div>
@endsection
