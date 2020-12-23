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
                    <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
                        <div class="border card max-content mb-3">
                            <sidebar-component :categories="{{ json_encode($categories) }}"></sidebar-component>
                        </div>
                        <div>
                            <button class="custom-btn-primary w-100 p-2" data-toggle="modal" data-target="#create-docs">Создать документацию</button>
                        </div>
                        <div>
                            <modal></modal>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-9 mb-3">
                        @if(isset($apidocs))
                            <div class="card border p-4">

                            </div>
                        @elseif(isset($kiasdocs))
                            <div class="card border p-4">

                            </div>
                        @else
                            <div class="card border p-4">
                                <h2 class="text-center">Добро пожаловать в <span class="text-uppercase">docs.cic.kz</span>!</h2>
                                <p class="text-center">Здесь вы можете найти документацию любого метода</p>
                                <p class="text-center">Прочитать, и понять как всё устроено и работает</p>
                                <div class="p-4 border mb-3">
                                    <p>Небольшое примечание:</p>
                                    <p>Документацию можно будет вносить самостоятельно, при этом нужно помнить что заполнять нужно аккуратно, так как могут возникнуть сложности дальнейшего редактирования. Поэтому просим заполнять документацию без ошибок, а также разделять каждую документацию отдельно по категориям.</p>
                                </div>
                                <h3 class="text-center text-uppercase">happy hacking!</h3>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </main>

    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/documentation/index.js') }}"></script>
@endsection
