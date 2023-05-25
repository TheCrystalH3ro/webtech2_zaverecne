@extends('layouts.app')

@section('content')
    
    <div class="content min-h-screen w-100">

        @if ($errors->any())
            @foreach ($errors as $error)
                {{ $error->message }}<br>
            @endforeach
        @endif

        <form class="mb-3" action="{{ route('sets.assign', ["id" => $set->id]) }}" method="post">
            @csrf
            <label for="email">{{ __("Student's email address") }}</label>

            <div class="d-flex gap-3">
                <input class="form-control" type="email" name="email" id="email">
                @error('email')
                        {{ $message }}
                    @enderror
                <button class="btn btn-primary" type="submit">{{ __('Assign') }}</button>
            </div>
        </form>

        <h2>{{ __("Assigned to students") }}:</h2>
        <table class="w-100">
            @foreach ($set->users as $user)
                <tr>
                    <td>
                        <form action="{{ route('sets.unassign', ["id" => $set->id, "user" => $user->id]) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <div class="alert alert-dismissible alert-danger">

                                <button type="submit" class="btn-close" ></button>
                                <p>{{ $user->firstname }} {{ $user->lastname }}</p>
                                <p>{{ $user->email }}</p>
                            </div>

                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

    </div> 

@endsection