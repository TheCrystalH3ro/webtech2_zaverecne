@if ($errors->any())
    @foreach ($errors as $error)
        {{ $error->message }}<br>
    @endforeach
@endif

<form action="{{ route('upload.images') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="images[]" id="images" multiple accept="image/*">
    @error('images.*')
        {{ $message }}
    @enderror
    <button type="submit">Upload</button>
</form>
