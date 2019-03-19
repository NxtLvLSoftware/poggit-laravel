@if(Session::has('success'))
    <div class="container-fluid">
        @if(Session::has('success'))
            @component('layouts.partials.alerts.alert', ['type' => 'success'])
                {{ Session::get('success') }}
            @endcomponent
        @endif
        @if(Session::has('warning'))
            @component('layouts.partials.alerts.alert', ['type' => 'warning'])
                {{ Session::get('warning') }}
            @endcomponent
        @endif
        @if(Session::has('error'))
            @component('layouts.partials.alerts.alert', ['type' => 'danger'])
                {{ Session::get('error') }}
            @endcomponent
        @endif
    </div>
@endif
