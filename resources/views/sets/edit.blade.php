@if ($errors->any())
    @foreach ($errors as $error)
        {{ $error->message }}<br>
    @endforeach
@endif

<h1>Edit: {{ $set->getTitle() }}</h1>

<form action="{{ route('sets.update', ["id" => $set->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="problemSet" id="problemSet" accept=".tex">
    @error('problemSet')
        {{ $message }}
    @enderror
    <button type="submit">Upload</button>
</form>
