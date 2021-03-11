@extends('dev.layout')

@section('body')


    <style>
        .report-table {

        }

        .report-table .report-class {
            width: 500px;
        }

        .report-table .report-size {
            width: 150px;
        }

        .report-table .report-methods {
        }


    </style>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <tbody>
                    @foreach ($counts as $type => $count)
                        <tr>
                            <td> {{ $type }}</td>
                            <td><b>{{ $count }}</b></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach ($rows as $type => $entry)
                    <div>
                        <h2>
                            {{ $type }} ({{ count($entry) }})
                        </h2>
                        <table class="table table-striped report-table">
                            <tbody>
                            @foreach ($entry as $row)
                                <tr>
                                    <td class="class-index">
                                        {{ $loop->index + 1 }}
                                    </td>
                                    <td class="class-lines-count">
                                        [<b>{{ $row['location']['size'] }}</b> lines]

                                    </td>
                                    <td class="report-class">

                                        <a href="{{ $row['phpstormLink'] }}" data-bs-toggle="tooltip-disabled"
                                           title="{{ $row['class'] }}">
                                            {{ $row['shortName'] }}
                                        </a>

                                        @if ($row['type'] === 'Middlewares')
                                            @if (!empty($row['middlewareKey']))
                                                as '{{ $row['middlewareKey'] }}'
                                            @endif
                                        @endif
                                    </td>
                                    <td class="report-methods">
                                        @php($classSlug = Str::slug($row['class']))
                                        @if(count($row['methods']))
                                            <div class="text-center">
                                                <a data-bs-toggle="collapse" href="#{{$classSlug}}" role="button"
                                                   aria-expanded="false" aria-controls="collapseExample">
                                                    <b>{{ $row['methodsCount'] }}</b> methods
                                                    @if ($row['type'] === 'Controllers')
                                                        (
                                                        <b>{{ $row['actionsCount'] }}</b> actions +
                                                        <b>{{ $row['methodsCount'] - $row['actionsCount'] }}</b> non-actions
                                                        )
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="collapse" id="{{$classSlug}}">
                                                <table class="table table-striped">
                                                    <tbody>
                                                    @foreach ($row['methods'] as $method)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}.</td>
                                                            <td>
                                                                @if ($method['action']['found'])
                                                                    <span title="{{$method['action']['uri']}}">
                                                                    {{ $method['action']['uri'] }}
                                                                </span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ $method['phpstormLink'] }}">
                                                                    {{ implode(' ', $method['access']) }}
                                                                    <b>{{ $method['name'] }}</b>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <b>{{$method['location']['size']}} lines</b>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @else
                                            <div class="text-center">
                                                No methods
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endsection
