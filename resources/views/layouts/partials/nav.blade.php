<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand ml-4" href="{{ url('/') }}">
        @include('layouts.partials.nav.brand')
    </a>
    <button class="navbar-toggler mr-4" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <div class="navbar-nav mr-md-auto">
            @include('layouts.partials.nav.left')
        </div>

        <!-- Right Side Of Navbar -->
        <div class="navbar-nav ml-md-auto">
            @include('layouts.partials.nav.right')
        </div>
    </div>
</nav>
