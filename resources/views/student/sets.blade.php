@extends('layouts.app')

@section('content')
    
    <div class="content min-h-screen">

        <h1>{{ __('Sets of student :name', ["name" => $student->name]) }}</h1>

        <form action="{{ route('student.sets', ['id' => $student->id]) }}" method="post">
            @csrf

            <div class="d-flex gap-3">

                <select class="form-select" name="problemSet" id="problemSet">
                    @foreach ($sets as $set)
                        <option value="{{ $set->id }}">{{ $set->getTitle() }}</option>
                    @endforeach
                </select>
                <button class="btn btn-outline-light" type="submit" @if($sets->isEmpty()) disabled @endif>{{ __('Assign') }}</button>

            </div>

        </form>

        <table>
            @foreach ($student->sets as $set)
                <tr>
                    <td>{{ $set->getTitle() }}</td>
                    <td>
                        <form action="{{ route('student.sets.unassign', ['id' => $student->id, "set" => $set->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-light" type="submit">{{ __('Unassign') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>

@endsection