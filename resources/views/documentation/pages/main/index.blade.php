@extends('documentation.layouts.main')
@section('title')
    <title>Главная страница | docs.cic.kz</title>
@endsection
@section('content')
    @include('documentation.layouts.header')
    <main id="documentation-app">

    </main>
    @include('documentation.layouts.footer')
@endsection
@section('scripts')
    <script src="{{ asset('js/documentation/index.js') }}"></script>
@endsection
