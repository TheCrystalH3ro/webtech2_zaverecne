<form action="{{ route('problems.generate') }}" method="POST">
    @csrf

    <ul>
    @forelse ($student->availableSets as $set)
        <li>
            <label for="problemSet-{{ $set->id }}">{{ $set->getTitle() }}</label>
            <input type="checkbox" name="problemSets[]" id="problemSet-{{ $set->id }}" value="{{ $set->id }}">
        </li>
    @empty
        <li>
            <p>{{ __("You don't have any available problem sets.") }}</p>
        </li>
    @endforelse
    </ul>

    <button type="submit" @if($student->availableSets->isEmpty()) disabled @endif>{{ __('Generate math problem') }}</button>

</form>

