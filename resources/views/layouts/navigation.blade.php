<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url("/") }}">{{ __(config('app.name', 'Zaverečné zadanie')) }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav me-auto">
            @auth
                @if(auth()->user()->role->name == App\Models\Role::$TEACHER)
                    <li class="nav-item">
                        <a class="nav-link @if(Request::segment(1) == 'students') active @endif" href="{{ route('student.index') }}">{{ __("Students") }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Request::segment(1) == 'sets') active @endif" href="{{ route('sets.index') }}">{{ __("Sets") }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Request::segment(1) == 'images') active @endif" href="{{ route('images.index') }}">{{ __("Images") }}</a>
                    </li>
                @endif    
            @endauth
            <li class="nav-item">
                <a class="nav-link @if(Request::segment(1) == 'tutorial') active @endif" href="{{ route('tutorial') }}">{{ __("Tutorial") }}</a>
            </li>
        </ul>
        <div class="navbar-nav d-flex ms-auto align-items-lg-center">
            <div class="flex-row pe-2 gap-1 gap-lg-0 d-flex">
                <a href="{{ url('/language/en') }}" class="@if(app()->isLocale('en')) active @endif nav-link">en</a>
                <span class="nav-link text-white">|</span>
                <a href="{{ url('/language/sk') }}" class="@if(app()->isLocale('sk')) active @endif nav-link">sk</a>
            </div>
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button class="btn btn-outline-light">{{ __('LOGOUT') }}</button>
                </form>
            @endauth
        </div>
      </div>
    </div>
  </nav>