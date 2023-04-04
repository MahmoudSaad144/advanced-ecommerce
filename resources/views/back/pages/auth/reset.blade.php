@extends('back.layouts.app')

@section('title')
    Reset Password
@endsection


@section('content')

<div class="page page-center">
    <div class="container-tight py-4">
        <div class="text-center mb-4">
        <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{asset('./back/static/logo.svg')}}" height="36" alt="logo"></a>
        </div>
        @livewire('auth.reset-form')
    </div>
</div>

@endsection
