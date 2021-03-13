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
                    <tr>
                        <td>Routes are cacheable</td>
                        <td>
                            @if($cacheable)
                                <span class="badge bg-success">yes</span>
                            @else
                                <span class="badge bg-danger">no</span>
                                <b>Reason:</b> <i>{{ $noCacheableReason }}</i>
                            @endif
                        </td>
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
                <table class="table table-striped routes-table">
                    <thead>
                    <tr>
                        <th>
                            <input type="text"
                                   class="form-control search-method"
                                   placeholder="Method"
                            />
                        </th>
                        <th>
                            <input type="text"
                                   class="form-control search-domain"
                                   placeholder="Domain"
                            />
                        </th>
                        <th>
                            <input type="text"
                                   class="form-control search-uri"
                                   placeholder="URI"
                            />
                        </th>
                        <th>
                            <input type="text"
                                   class="form-control search-name"
                                   placeholder="Name"
                            />
                        </th>
                        <th>
                            <input type="text"
                                   class="form-control search-action"
                                   placeholder="Action"
                            />
                        </th>
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
                            <td data-uri="{{ $route->uri }}" class="uri">
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
                            <td data-name="{{ $route->getName() ?? '' }}" class="name">
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

    <script>
        $(function () {
            $(document).on('keyup', '.search-uri', function () {
                let query = $(this).val();
                $('.routes-table tbody tr')
                    .hide()
                    .filter(function () {
                        let uri = $('td.uri', this).data('uri');
                        return uri.toLowerCase().includes(query.toLowerCase());
                    })
                    .show();
            });

            $(document).on('keyup', '.search-name', function () {
                let query = $(this).val();
                $('.routes-table tbody tr')
                    .hide()
                    .filter(function () {
                        let name = $('td.name', this).data('name');
                        return name.toLowerCase().includes(query.toLowerCase());
                    })
                    .show();
            });
        });
    </script>
@endsection
