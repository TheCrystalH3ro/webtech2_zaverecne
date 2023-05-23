@extends('layouts.guest')


@section('content')
    <div class="login card border-primary w-100 mb-5">
        <div class="card-header">
            {{ __("Login") }}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group mb-2">
                    <label for="email" class="text-white text-sm">{{ __('Email') }}</label>
                    <input type="email" class="form-control mt-1" name="email" value="{{ old('email') }}" required autofocus>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="form-group mb-2">
                    <label for="password" class="text-white text-sm">{{ __('Password') }}</label>
                    <input type="password" class="form-control mt-1"  name="password" required>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="d-flex gap-3 items-center justify-end mt-4">

                    <button class="btn btn-primary">{{ __('LOGIN') }}</button>

                    <a href="{{ route("register") }}" class="btn btn-outline-primary">{{ __("REGISTER") }}</a>

                </div>
            </form>
        </div> 
    </div>
@endsection