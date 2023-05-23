<h1>{{ $set->getTitle() }}</h1>
<a href="{{ route('sets.edit', ["id" => $set->id]) }}">{{ __('Edit problem set') }}</a>
<a href="{{ route('sets.download', ["id" => $set->id]) }}" target="_blank">{{  __('Download problem set') }}</a>
<a href="{{ route('sets.assign', ["id" => $set->id]) }}">{{  __('Assign to student') }}</a>
<form action="{{ route('sets.destroy', ["id" => $set->id]) }}" method="post">
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

@section('scripts')
    @parent

    <script src="https://cdn.jsdelivr.net/npm/evaluatex@2.2.0/dist/evaluatex.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js"></script>

@endsection
