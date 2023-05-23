@extends('layouts.guest')


@section('content')
    <div class="register card border-primary     w-100">
        <div class="card-header">
            {{ __("Register") }}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group mb-2">
                    <label for="firstname" class="text-white text-sm">{{ __('Firstname') }}</label>
                    <input type="text" class="form-control mt-1" name="firstname" value="{{ old('firstname') }}" required autofocus>
                    <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
                </div>

                <div class="form-group mb-2">
                    <label for="lastname" class="text-white text-sm">{{ __('Lastname') }}</label>
                    <input type="text" class="form-control mt-1" name="lastname" value="{{ old('lastname') }}" required>
                    <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                </div>

                <div class="form-group mb-2">
                    <label for="email" class="text-white text-sm">{{ __('Email') }}</label>
                    <input type="email" class="form-control mt-1" name="email" value="{{ old('email') }}" required>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="form-group mb-2">
                    <label for="password" class="text-white text-sm">{{ __('Password') }}</label>
                    <input type="password" class="form-control mt-1"  name="password" required>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="form-group mb-2">
                    <label for="password_confirmation" class="text-white text-sm">{{ __('Confirm Password') }}</label>
                    <input type="password" class="form-control mt-1"  name="password_confirmation" required>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="form-group mb-2">
                    <label for="role" class="text-white text-sm">{{ __('Role') }}</label>
                    <select name="role" id="role" class="form-select mt-1">
                        <option value="" disabled selected></option>
                        @foreach (App\Models\Role::get() as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>

                <div class="d-flex gap-3 items-center justify-end">

                    <button class="btn btn-primary">{{ __('REGISTER') }}</button>

                    <a href="{{ route("login") }}" class="btn btn-outline-primary">{{ __("LOGIN") }}</a>

                </div>
            </form>
        </div>
    </div>    
@endsection