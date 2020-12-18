@extends('documentation.layouts.main')
@section('title')
    <title>Главная страница | docs.cic.kz</title>
@endsection
@section('content')
    <div id="documentation-app" class="w-100">
        <header-component></header-component>
        <main class="main pt-3">
            <div class="container">
                <div class="row">
                    <div class="card col-sm-12 col-md-4 col-lg-3">
                        левый блок
                        test
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-9">

                    </div>
                </div>
            </div>
        </main>

    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/documentation/index.js') }}"></script>
@endsection
