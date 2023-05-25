@extends('layouts.app')

@section('content')
    
    <div class="content min-h-screen w-100">

        <h1 class="mb-3">{{ __('Sets of student :name', ["name" => $student->name]) }}</h1>

        <form action="{{ route('student.sets', ['id' => $student->id]) }}" method="post">
            @csrf

            <div class="d-flex gap-3 mb-3">

                <select class="form-select" name="problemSet" id="problemSet">
                    @foreach ($sets as $set)
                        <option value="{{ $set->id }}">{{ $set->getTitle() }}</option>
                    @endforeach
                </select>

                <button class="btn btn-primary" type="submit" @if($sets->isEmpty()) disabled @endif>{{ __('Assign') }}</button>

            </div>

        </form>

        <table class="w-100">
            @foreach ($student->sets as $set)
                <tr>
                    <td>
                        <form action="{{ route('student.sets.unassign', ['id' => $student->id, "set" => $set->id]) }}" method="post">
                            
                            @csrf
                            @method('DELETE')

                            <div class="alert alert-dismissible alert-danger">

                                <button type="submit" class="btn-close" ></button>
                                {{ $set->getTitle() }}
                            </div>

                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>

@endsection