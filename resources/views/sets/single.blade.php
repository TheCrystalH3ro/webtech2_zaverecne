<h1>{{ $set->getTitle() }}</h1>
<a href="{{ route('sets.edit', ["id" => $set->id]) }}">{{ __('Edit problem set') }}</a>
<a href="#">{{  __('Download problem set') }}</a>
<form action="#" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">{{ __('Delete problem set') }}</button>
</form>

<hr>

<h2>{{ __('Problems') }}</h2>

@foreach ($set->mathProblems as $mathProblem)
    <div>
        <h4>Zadanie:</h4>
        <p>{{ $mathProblem->task }}</p>
        @if ($mathProblem->image)
            <img src="{{ asset('storage/uploadedImg/' . $mathProblem->image) }}" alt="">
        @endif
        <h4>Riešenie:</h4>
        <p>{{ $mathProblem->solution }}</p>
        <hr>
    </div>
@endforeach
