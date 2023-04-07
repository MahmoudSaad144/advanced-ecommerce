@extends('back.layouts.app')

@section('title')
    {{ __("Shop") }}
@endsection


@section('content')

    @livewire('front.shop.single')

@endsection
