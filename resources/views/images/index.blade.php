<a href="{{ route('upload.images.form') }}">{{ __('Upload new image') }}</a>

@foreach ($images as $image)
    <div>
        <h3>
            {{ $image->name }}
        </h3>
        <form action="#" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">{{ __('Delete image') }}</button>
        </form>
        <img src="{{ asset('storage/' . $image->path)  }}" alt="{{ $image->name }}">
    </div>
@endforeach
