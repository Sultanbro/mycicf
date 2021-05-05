@extends('dev.layout')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    Kias
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>Kias Session ID</td>
                        <td>{{$response->Sid}}</td>
                    </tr>
                    <tr>
                        <td>Mock enabled</td>
                        <td>{{$config['mock']['enabled'] ? 'yes' : 'no'}}</td>
                    </tr>
                    <tr>
                        <td>Mock delay</td>
                        <td>{{$config['mock']['delay']}}</td>
                    </tr>
                    <tr>
                        <td>URL</td>
                        <td>{{$config['url']}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
