@extends('layouts.app')

@section('content')
    
    <div class="content min-h-screen w-100">

        <button type="button" class="btn btn-outline-light w-100">{{ __('DOWNLOAD PDF') }}</button>
        
        @switch(auth()->user()->role->name)
            @case(App\Models\Role::$STUDENT)
                @include('tutorial.student')
                @break
            @case(App\Models\Role::$TEACHER)
                @include('tutorial.teacher')
                @break
            @default
                
        @endswitch
    </div>

@endsection