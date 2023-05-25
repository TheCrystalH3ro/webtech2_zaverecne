@extends('layouts.app')

@section('content')

    <div class="content min-h-screen w-100">

        <h1>{{ __('Upload new images') }}</h1>
    
        <form action="{{ route('upload.images') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="d-flex gap-2 mb-3"> 
                <input class="form-control" type="file" name="images[]" id="images" multiple accept="image/*">
                @error('images.*')
                    {{ $message }}
                @enderror
                <button class="btn btn-secondary" type="submit">{{  __('Upload') }}</button>
            </div>

        </form>

        @foreach ($images as $image)
            <div class="card mt-4 mb-4">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h3>
                            {{ $image->name }}
                        </h3>
                        <form action="{{ route('images.destroy', ["imageName" => $image->base]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-primary mb-2" type="submit">{{ __('Delete image') }}</button>
                        </form>
                    </div>

                    <img class="img-fluid" class="mb-4" src="{{ asset('storage/' . $image->path)  }}" alt="{{ $image->name }}">

                </div>
            </div>
        @endforeach

    </div>

@endsection