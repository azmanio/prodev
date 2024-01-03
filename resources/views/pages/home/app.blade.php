@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    @include('pages.home.hero')

    <main id="main" class="mt-3">
        @include('pages.home.clients')

        @include('pages.home.about')

        @include('pages.home.why-us')

        @include('pages.home.services')

        @include('pages.home.portfolio')

        @include('pages.home.pricing')

        @include('pages.home.faq')

        @include('pages.home.contact')

    </main><!-- End #main -->

@endsection
