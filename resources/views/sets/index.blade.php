@extends('layouts.app')

@section('content')
    
    <div class="content min-h-screen w-100">

        <h1>{{ __('Upload new set') }}</h1>

        <form class="d-flex gap-3 mb-3" action="{{ route('upload.file') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input class="form-control" type="file" name="problemSet" id="problemSet" accept=".tex">
            @error('problemSet')
                {{ $message }}
            @enderror
            <button class="btn btn-primary" type="submit">{{ __('Upload') }}</button>
        </form>

        <ul class="list-unstyled p-0">
            @foreach ($sets as $set)

            <li>
                <a href="{{ route('sets.view', ["id" => $set->id]) }}" class="text-decoration-none">
                    <div class="alert alert-dismissible alert-danger">
                        {{ $set->getTitle()}}
                    </div>
                </a>
            </li>

            @endforeach
        </ul>

    </div>

@endsection