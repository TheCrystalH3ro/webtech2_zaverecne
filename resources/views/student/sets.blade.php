<h1>{{ __('Sets of student :name', ["name" => $student->name]) }}</h1>

<form action="{{ route('student.sets', ['id' => $student->id]) }}" method="post">
    @csrf
    <select name="problemSet" id="problemSet">
        @foreach ($sets as $set)
            <option value="{{ $set->id }}">{{ $set->getTitle() }}</option>
        @endforeach
    </select>
    <button type="submit" @if($sets->isEmpty()) disabled @endif>{{ __('Assign') }}</button>
</form>

<table>
    @foreach ($student->sets as $set)
        <tr>
            <td>{{ $set->getTitle() }}</td>
            <td>
                <form action="{{ route('student.sets.unassign', ['id' => $student->id, "set" => $set->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">{{ __('Unassign') }}</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
