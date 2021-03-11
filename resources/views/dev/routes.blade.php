@extends('dev.layout')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <tbody>
                    @foreach($routes as $route)
                        <tr>
                            <td>
                                <b>
                                    {{ implode('|', $route->methods) }}
                                </b>
                            </td>
                            <td>
                                <i>
                                    {{ $route->uri }}
                                </i>
                            </td>
                            <td>
                                @if (gettype($route->action['uses']) === 'string')
                                    {{ $route->action['uses'] }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
