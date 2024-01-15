@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    @include('pages.home.section.hero')

    <main id="main" class="mt-3">
        @include('pages.home.section.clients')

        @include('pages.home.section.about')

        @include('pages.home.section.why-us')

        @include('pages.home.section.services')

        @include('pages.home.section.package')

        @include('pages.home.section.portfolio')

        @include('pages.home.section.faq')

        @include('pages.home.section.contact')

    </main><!-- End #main -->

@endsection
