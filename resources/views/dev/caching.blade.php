@extends('dev.layout')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>Config is cacheable</td>
                        <td>
                            @if($config['cacheable'])
                                <span class="badge bg-success">yes</span>
                            @else
                                <span class="badge bg-danger">no</span>
                                <b>Reason:</b> <i>{{ $config['reason'] }}</i>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Routes are cacheable</td>
                        <td>
                            @if($routes['cacheable'])
                                <span class="badge bg-success">yes</span>
                            @else
                                <span class="badge bg-danger">no</span>
                                <b>Reason:</b> <i>{{ $routes['reason'] }}</i>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Views are cacheable</td>
                        <td>
                            @if($views['cacheable'])
                                <span class="badge bg-success">yes</span>
                            @else
                                <span class="badge bg-danger">no</span>
                                <b>Reason:</b> <i>{{ $views['reason'] }}</i>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Events are cacheable</td>
                        <td>
                            @if($views['cacheable'])
                                <span class="badge bg-success">yes</span>
                            @else
                                <span class="badge bg-danger">no</span>
                                <b>Reason:</b> <i>{{ $views['reason'] }}</i>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>Cache driver</td>
                        <td>{{ config('cache.default') }}</td>
                    </tr>
                    <tr>
                        <td>Available drivers</td>
                        <td>
                            <ul>
                                @foreach (config('cache.stores') as $key => $store)
                                    <li>{{ $key }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
