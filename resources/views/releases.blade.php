@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 px-md-5">
        <div class="row justify-content-center">
            @for ($i = 0; $i < 40; $i++)
               @include('releases.release')
            @endfor
        </div>
    </div>
@endsection
