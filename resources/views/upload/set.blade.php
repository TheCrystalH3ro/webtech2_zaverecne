@if ($errors->any())
    @foreach ($errors as $error)
        {{ $error->message }}<br>
    @endforeach
@endif

<form action="{{ route('upload.file') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="problemSet" id="problemSet" accept=".tex">
    @error('problemSet')
        {{ $message }}
    @enderror
    <button type="submit">Upload</button>
</form>
