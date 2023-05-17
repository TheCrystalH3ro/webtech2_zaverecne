@if ($errors->any())
    @foreach ($errors as $error)
        {{ $error->message }}<br>
    @endforeach
@endif

<h1>{{ __('Edit: :title', ["title" => $set->getTitle()]) }}</h1>
<form action="{{ route('sets.update', ["id" => $set->id]) }}" method="post">
    @csrf
    @method('PATCH')
    <div>
        <label for="title">{{ __('Title') }}</label>
        <input type="text" name="title" id="title" value="{{ $set->getTitle() }}">
        @error('title')
            {{ $message }}
        @enderror
    </div>
    <div>
        <label for="start_date">{{ __('Start date') }}</label>
        <input type="date" name="start_date" id="start_date" value="{{ $set->start_date }}">
        @error('start_date')
            {{ $message }}
        @enderror
    </div>
    <div>
        <label for="end_date">{{ __('End date') }}</label>
        <input type="date" name="end_date" id="end_date" value="{{ $set->end_date }}">
        @error('end_date')
            {{ $message }}
        @enderror
    </div>
    <button type="submit">{{ __('Save') }}</button>
</form>


<h2>{{ __('Reupload') }}</h2>

<form action="{{ route('sets.reupload', ["id" => $set->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="file" name="problemSet" id="problemSet" accept=".tex">
    @error('problemSet')
        {{ $message }}
    @enderror
    <button type="submit">{{ __('Upload') }}</button>
</form>
