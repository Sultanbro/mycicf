@extends('documentation.layouts.main')
@section('head')
    <title>Главная страница</title>
@endsection
@section('content')
    @include('documentation.layouts.header')
    <section>
    </section>
    @include('documentation.layouts.footer')
@endsection
@section('scripts')
    <script src="{{ asset('js/documentation/index.js') }}"></script>
@endsection
