<form method="POST" action="{{ route('logout') }}">
    @csrf

    <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
        {{ __('Log Out') }}
    </x-dropdown-link>
</form>

<a href="{{ route('problems.pick') }}">{{ __('Generate math problems') }}</a>

<h2>{{ __('Assigned problems') }}</h2>

@foreach ($student->unsubmittedMathProblems as $mathProblem)
    <div>
        <h4>Zadanie:</h4>
        <p>{{ $mathProblem->task }}</p>
        @if ($mathProblem->image)
            <img src="{{ asset('storage/uploadedImg/' . $mathProblem->image) }}" alt="">
        @endif
        <a href="{{ url('/editor') }}">{{ __('Solve') }}</a>
    </div>
@endforeach

<hr>

<h2>{{ __('Handed in problems') }}</h2>

@foreach ($student->submittedMathProblems as $mathProblem)
    <div>
        <h4>Zadanie:</h4>
        <p>{{ $mathProblem->task }}</p>
        @if ($mathProblem->image)
            <img src="{{ asset('storage/uploadedImg/' . $mathProblem->image) }}" alt="">
        @endif
    </div>
@endforeach
