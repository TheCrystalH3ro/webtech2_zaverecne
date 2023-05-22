<h1>{{ __('Students') }}</h1>
<table>
    <thead>
        <tr>
            <th>{{ __('ID') }}</th>
            <th>{{ __('Firstname') }}</th>
            <th>{{ __('Lastname') }}</th>
            <th>{{ __('Num. of submitted problems') }}</th>
            <th>{{ __('Num. of handed in problems') }}</th>
            <th>{{ __('Points') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->firstname }}</td>
                <td>{{ $student->lastname }}</td>
                <td>{{ $student->mathProblems->count() }}</td>
                <td>{{ $student->submittedMathProblems->count() }}</td>
                <td>{{ $student->getPoints() }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
