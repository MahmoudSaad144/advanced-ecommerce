@extends('back.layouts.app')

@section('title')
    verification Email
@endsection


@section('content')

        @livewire('auth.verification-email-send')

@endsection
