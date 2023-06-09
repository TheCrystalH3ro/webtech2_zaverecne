@extends('layouts.guest')

@section('content')
    <div class="welcome card border-primary w-100 mb-5">
        <div class="card-body">
            <h1 class="card-title display-5">{{ __('WELCOME to :title!', ["title" => config('app.name', 'MathTaskHub')]) }}</h4>
            <p class="card-text">{{ __('Teachers can upload math tasks for students to solve and students can solve challenging math problems.') }}</p>
            <div class="d-flex gap-3 mt-3">
                <a href="{{ route("login") }}" class="btn btn-primary btn-lg">{{ __("LOGIN") }}</a>
                <a href="{{ route("register") }}" class="btn btn-outline-primary btn-lg">{{ __("REGISTER") }}</a>
            </div>
        </div>
    </div> 
@endsection