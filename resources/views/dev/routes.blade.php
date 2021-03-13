@extends('dev.layout')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>Routes</td>
                        <td>{{ count($routes) }}</td>
                    </tr>
                    <tr>
                        <td>Routes without names</td>
                        <td>{{ $stats['routes-with-no-name'] }}</td>
                    </tr>
                    </tbody>
                </table>

                <table class="table table-striped">
                    @foreach ($routesByDomain as $domain => $count)
                        <tr>
                            <td>
                                @empty($domain)
                                    <i>{No domain}</i>
                                @else
                                    {{ $domain }}
                                @endempty
                            </td>
                            <td>{{ $count }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Method</th>
                        <th>Domain</th>
                        <th>URI</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($routes as $route)
                        <tr>
                            <td>
                                <b>
                                    {{ implode(' ', $route->methods) }}
                                </b>
                            </td>
                            <td>
                                @empty($route->domain())
                                    <i>{No domain}</i>
                                @else
                                    {{ $route->domain() }}
                                @endempty
                            </td>
                            <td>
                                <div>
                                    @if (strpos($route->uri, '/') === false)
                                        <i class="no-group">{{ $route->uri }}</i>
                                    @else
                                        <i>{{ $route->uri }}</i>
                                    @endif
                                </div>
                                <div>
                                    @json($route->parameterNames())
                                </div>
                            </td>
                            <td>
                                @if($route->getName())
                                    {{ $route->getName() }}
                                @else
                                    <span class="no-route-name">
                                        {No name}
                                    </span>
                                @endif
                            </td>
                            <td>
                                @if (gettype($route->action['uses']) === 'string')
                                    {{ $route->action['uses'] }}
                                @elseif (gettype($route->action['uses']) === 'object' && $route->action['uses'] instanceof Closure)
                                    <i class="closure"> {Closure}</i>
                                @else
                                    {{ gettype($route->action['uses']) }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        .closure {
            color: red;
        }

        .no-group {
            color: red;
        }

        .no-route-name {
            color: red;
        }
    </style>
@endsection
