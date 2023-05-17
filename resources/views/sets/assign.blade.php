@if ($errors->any())
    @foreach ($errors as $error)
        {{ $error->message }}<br>
    @endforeach
@endif

<form action="{{ route('sets.assign', ["id" => $set->id]) }}" method="post">
    @csrf
    <label for="email">{{ __("Student's email address") }}</label>
    <input type="email" name="email" id="email">
    @error('email')
            {{ $message }}
        @enderror
    <button type="submit">{{ __('Assign') }}</button>
</form>

<h2>Assigned to students:</h2>
<table>
    @foreach ($set->users as $user)
       <tr>
            <td>
                {{ $user->name }}
            </td>
            <td>
                {{ $user->email }}
            </td>
            <td>
                <form action="{{ route('sets.unassign', ["id" => $set->id, "user" => $user->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">{{ __('Unassign') }}</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
