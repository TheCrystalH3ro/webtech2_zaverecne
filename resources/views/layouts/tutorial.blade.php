@extends('layouts.app')

@section('content')

    <div class="content min-h-screen w-100">

        <a id="downloadPDF" href="{{ route('tutorial.download') }}" class="btn btn-outline-light w-100" target="_blank">{{ __('DOWNLOAD PDF') }}</a>

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

@section('scripts')
    @parent

    <script>
        $("#downloadPDF").click((event) => {

            event.preventDefault();

            print();
        });
    </script>
@endsection