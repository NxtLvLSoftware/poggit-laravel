@guest
    <li class="nav-item">
        <a class="nav-link" href="{{ route('auth.github') }}">{{ __('Login') }}</a>
    </li>
@else
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <img src="https://github.com/{{ Auth::user()->username }}.png" class="nav-avatar mr-2" alt="avatar">
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#logout"
               onclick="event.preventDefault(); $('#logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
@endguest
