<h1>{{ $student->name }}</h1>

<h4>{{ $student->email }}</h4>

<hr>

<a href="{{ route('student.sets', ['id' => $student->id]) }}">{{ __('Assign problem sets') }}</a>
