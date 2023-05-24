@extends('layouts.app')

@section('content')
    
    <div class="content min-h-screen w-100">

        <h1>{{ __('Generate math problems') }}</h1>

        <form action="{{ route('problems.generate') }}" method="POST">
            @csrf

            <ul class="list-unstyled set-list">
            @forelse ($student->availableSets as $set)
                <li>
                    <label for="problemSet-{{ $set->id }}" class="w-100">
                        <div class="alert alert-dismissible alert-danger d-flex">
                            {{ $set->getTitle() }}
                            <input class="form-check-input ms-auto" type="checkbox" name="problemSets[]" id="problemSet-{{ $set->id }}" value="{{ $set->id }}">
                        </div>  
                    </label>
                </li>
            @empty
                <li>
                    <h3>{{ __("You don't have any available problem sets.") }}</h3>
                </li>
            @endforelse
            </ul>
            @error('problemSets.*')
                {{ $message }}
            @enderror

            <button class="btn btn-outline-light" type="submit" @if($student->availableSets->isEmpty()) disabled @endif>{{ __('GENERATE') }}</button>

        </form>

    </div>

@endsection