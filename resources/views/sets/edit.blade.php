@extends('layouts.app')

@section('content')

    <div class="content min-h-screen w-100">
    
        @if ($errors->any())
            @foreach ($errors as $error)
                {{ $error->message }}<br>
            @endforeach
        @endif

        <h1>{{ __('Edit: :title', ["title" => $set->getTitle()]) }}</h1>
        <form action="{{ route('sets.update', ["id" => $set->id]) }}" method="post">
            @csrf
            @method('PATCH')
            <div>
                <label for="title">{{ __('Title') }}</label>
                <input class="form-control mb-2" type="text" name="title" id="title" value="{{ $set->getTitle() }}">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
            <div>
                <label for="points">{{ __('Points') }}</label>
                <input class="form-control mb-2" type="number" name="points" id="points" min="0" value="{{ $set->points }}">
                @error('points')
                    {{ $message }}
                @enderror
            </div>
            <div>
                <label for="start_date">{{ __('Start date') }}</label>
                <input class="form-control mb-2" type="date" name="start_date" id="start_date" value="{{ $set->start_date }}">
                @error('start_date')
                    {{ $message }}
                @enderror
            </div>
            <div>
                <label for="end_date">{{ __('End date') }}</label>
                <input class="form-control mb-2" type="date" name="end_date" id="end_date" value="{{ $set->end_date }}">
                @error('end_date')
                    {{ $message }}
                @enderror
            </div>
            <button class="btn btn-primary w-100 mb-2" type="submit">{{ __('Save') }}</button>
        </form>


        <h2>{{ __('Reupload') }}</h2>

        <form action="{{ route('sets.reupload', ["id" => $set->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="d-flex gap-3">
                <input class="form-control" type="file" name="problemSet" id="problemSet" accept=".tex">
                @error('problemSet')
                    {{ $message }}
                @enderror
                <button class="btn btn-primary" type="submit">{{ __('Upload') }}</button>
            </div>

        </form>

    </div>

@endsection