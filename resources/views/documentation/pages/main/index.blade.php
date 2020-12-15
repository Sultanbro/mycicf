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
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        левый блок
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto blanditiis, cum ducimus fuga incidunt, inventore iste laborum officiis pariatur possimus quia temporibus. Consequuntur enim eum illo inventore nemo nostrum omnis sit ullam velit vitae! Asperiores est fuga quia quisquam repudiandae. Ad alias aliquam animi aut commodi dolorem, eos eveniet ex explicabo hic inventore iusto laboriosam nostrum officia omnis perspiciatis placeat quam quasi ratione rem, rerum tempora totam unde? Aperiam, at doloremque eius eos error, illo inventore magnam nihil non odio provident quas, quidem quis sed voluptas! Architecto eligendi, esse est id in nesciunt saepe sequi voluptatem. Aspernatur autem consequuntur corporis cupiditate ducimus eaque error eum excepturi facere facilis fuga harum incidunt laudantium maxime minus modi natus nihil nisi nobis, officiis, optio perspiciatis, placeat quam qui quia quidem quis quos rem sit suscipit temporibus tenetur ullam voluptatem! Adipisci laboriosam provident quaerat rem temporibus unde ut veritatis! Ab accusamus alias aperiam architecto commodi consectetur consequatur corporis delectus eos laborum nam natus nesciunt odit perspiciatis quae, quibusdam quidem, quis quo sed sequi similique sint tenetur velit voluptate voluptatem. Accusantium assumenda autem beatae iste ullam! Ad asperiores aut dolor laudantium quas tempora tenetur. Asperiores consequatur error facere ipsum laboriosam necessitatibus neque placeat quam repellat.
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-9">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto blanditiis, cum ducimus fuga incidunt, inventore iste laborum officiis pariatur possimus quia temporibus. Consequuntur enim eum illo inventore nemo nostrum omnis sit ullam velit vitae! Asperiores est fuga quia quisquam repudiandae. Ad alias aliquam animi aut commodi dolorem, eos eveniet ex explicabo hic inventore iusto laboriosam nostrum officia omnis perspiciatis placeat quam quasi ratione rem, rerum tempora totam unde? Aperiam, at doloremque eius eos error, illo inventore magnam nihil non odio provident quas, quidem quis sed voluptas! Architecto eligendi, esse est id in nesciunt saepe sequi voluptatem. Aspernatur autem consequuntur corporis cupiditate ducimus eaque error eum excepturi facere facilis fuga harum incidunt laudantium maxime minus modi natus nihil nisi nobis, officiis, optio perspiciatis, placeat quam qui quia quidem quis quos rem sit suscipit temporibus tenetur ullam voluptatem! Adipisci laboriosam provident quaerat rem temporibus unde ut veritatis! Ab accusamus alias aperiam architecto commodi consectetur consequatur corporis delectus eos laborum nam natus nesciunt odit perspiciatis quae, quibusdam quidem, quis quo sed sequi similique sint tenetur velit voluptate voluptatem. Accusantium assumenda autem beatae iste ullam! Ad asperiores aut dolor laudantium quas tempora tenetur. Asperiores consequatur error facere ipsum laboriosam necessitatibus neque placeat quam repellat.
                    </div>
                </div>
            </div>
        </main>

    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/documentation/index.js') }}"></script>
@endsection
