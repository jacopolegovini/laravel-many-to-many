@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{$tasks->title}}</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">{{$tasks->date}}</h6>
            <p class="card-text">{{$tasks->description}}</p>
            <a href="{{route('welcome.index')}}" class="card-link">Go Back</a>
        </div>
    </div>
</div>

@endsection
