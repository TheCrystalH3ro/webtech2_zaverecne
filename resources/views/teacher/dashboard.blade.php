@extends('layouts.app')

@section('content')

    <div class="d-flex gap-3">
        <h1>{{ __('WELCOME') }}</h1>
        <h2 class="display-4">{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</h2>
    </div>

@endsection