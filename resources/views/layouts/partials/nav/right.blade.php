<div class="nav-item">
    <a class="nav-link" href="{{ route('releases') }}">Releases</a>
</div>
<div class="nav-item">
    <a class="nav-link" href="#">Dev</a>
</div>
<div class="nav-item">
    <a class="nav-link" href="#">About</a>
</div>
@guest
    <div class="nav-item">
        <a class="nav-link" href="{{ route('auth.github') }}">{{ __('Login') }}</a>
    </div>
@else
    <div class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <img src="https://github.com/{{ Auth::user()->github_nick }}.png" class="nav-avatar mr-2" alt="avatar">
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item flex" href="#profile">
                <i class="fas fa-fw fa-user"></i>
                <span>Your profile</span>
            </a>
            <a class="dropdown-item" href="#projects">
                <i class="fas fa-fw fa-code"></i>
                <span>Your projects</span>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item float-right" href="#settings">
                <i class="fas fa-fw fa-cog"></i>
                <span>Settings</span>
            </a>
            <a class="dropdown-item" href="#logout" onclick="event.preventDefault(); $('#logout-form').submit();">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>{{ __('Logout') }}</span>
            </a>

            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
@endguest

