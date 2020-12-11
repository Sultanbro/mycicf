@extends('documentation.layouts.main')
@section('title')
    <title>Авторизация | docs.cic.kz</title>
@endsection
@section('content')
    <main id="documentation-login"
          class="d-flex justify-content-center align-items-center w-100 h-100">
        <Root></Root>
    </main>
@endsection
@section('scripts')
    <script src="{{ asset('js/documentation/login.js') }}"></script>
@endsection
