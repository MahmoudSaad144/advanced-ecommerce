@extends('back.layouts.app')
@section('title')
    Forgot-Password
@endsection

<div class="page page-center">
    <div class="container-tight py-4">
    <div class="text-center mb-4">
        <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{asset('./back/static/logo.svg')}}" height="36" alt="logo"></a>
    </div>
        @livewire('auth.forgot-form')
    <div class="text-center text-muted mt-3">
        Forget it, <a href="{{route('login')}}">send me back</a> to the sign in screen.
    </div>
    </div>
</div>

@section('content')



@endsection
