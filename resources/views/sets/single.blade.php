@extends('layouts.app')

@section('content')

    <div class="content min-h-screen w-100">

        <h1>{{ $set->getTitle() }}</h1>

        <div class="d-flex gap-2">

            <a href="{{ route('sets.assign', ["id" => $set->id]) }}" class="btn btn-secondary   ">{{  __('ASSING') }}</a>
            <a href="{{ route('sets.edit', ["id" => $set->id]) }}" class="btn btn-info">{{ __('EDIT') }}</a>
            <a href="{{ route('sets.download', ["id" => $set->id]) }}" class="btn btn-success" target="_blank">{{  __('DOWNLOAD') }}</a>

            <form action="{{ route('sets.destroy', ["id" => $set->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">{{ __('DELETE') }}</button>
            </form>

        </div>

        <hr>

        <h2>{{ __('Problems') }}</h2>

        @foreach ($set->mathProblems as $mathProblem)
            <div>
                <h4>Zadanie:</h4>
                <p>{{ $mathProblem->task }}</p>
                @if ($mathProblem->image)
                    <img src="{{ asset('storage/uploadedImg/' . $mathProblem->image) }}" alt="">
                @endif
                <h4>Riešenie:</h4>
                <p>{{ $mathProblem->solution }}</p>
                <hr>
            </div>
        @endforeach

    </div>

@endsection

@section('scripts')
    @parent

    <script src="https://cdn.jsdelivr.net/npm/evaluatex@2.2.0/dist/evaluatex.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js"></script>

@endsection
