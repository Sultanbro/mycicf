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
                        <p>
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#test-data" aria-expanded="false" aria-controls="collapseExample">
                                Button with data-target
                            </button>
                        </p>
                        <div class="collapse" id="test-data">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad atque beatae cum dicta, doloribus ducimus ea esse, laudantium minima mollitia quibusdam sequi temporibus voluptatibus voluptatum! Asperiores aut debitis dignissimos explicabo, hic impedit nemo nostrum omnis pariatur porro possimus qui recusandae saepe sit tempore totam voluptate! Corporis eaque minima voluptates.
                        </div>
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
