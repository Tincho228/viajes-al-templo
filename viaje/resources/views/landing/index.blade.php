@extends('layouts.app')

@include('landing.styles')

@section('content')
    <x-landing-navbar />
    <x-landing-header />
    <x-landing-services />
    <x-landing-contact />
@endsection
