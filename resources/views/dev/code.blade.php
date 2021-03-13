@extends('dev.layout')

@section('body')


    <style>
        .report-table {

        }

        .report-table .report-class {
            width: 350px;
        }

        .report-table .report-size {
            width: 150px;
        }

        .report-table .report-methods {
            width: 680px;
        }

        .showdoc-link {
            text-decoration: none;
            border-bottom: dashed 1px;
        }

        .too-large {
            color: red;
        }

        .doc-comment {
            color: green;
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
                    <tbody>
                    <tr>
                        <td>Total</td>
                        <td><b>{{ $classesCount }}</b> classes | <b>{{ $methodsCount }}</b> methods</td>
                    </tr>
                    <tr>
                        <td>Too large classes</td>
                        <td><b>{{ $tooLargeClassesCount }}</b></td>
                    </tr>
                    <tr>
                        <td>Too large methods</td>
                        <td><b>{{ $tooLargeMethodsCount }}</b></td>
                    </tr>
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
                                        [<b class="{{ $row['location']['isTooLarge'] ? 'too-large' : '' }}">{{ $row['location']['size'] }}</b>
                                        lines]

                                    </td>
                                    <td class="report-class">
                                        <a href="{{ $row['phpstormLink'] }}" data-bs-toggle="tooltip-disabled"
                                           title="{{ $row['class'] }}">
                                            <b>{{ $row['shortName'] }}</b>@if ($row['parent'])
                                                <i>extends {{ $row['parent'] }}</i>
                                            @endif</a>@if (count($row['traitNames']))
                                            uses {{ count($row['traitNames']) }} {{ \Str::plural('trait', count($row['traitNames'])) }}
                                        @endif

                                        @if ($row['type'] === 'Middlewares')
                                            @if (!empty($row['middlewareKey']))
                                                as '{{ $row['middlewareKey'] }}'
                                            @endif
                                        @endif
                                    </td>
                                    <td class="report-methods">
                                        @php($classSlug = 'modal_' . Str::slug($row['class']))
                                        @if(count($row['methods']))
                                            <div class="text-center">
                                                <a data-bs-toggle="modal" href="#" data-bs-target="#{{$classSlug}}" type="button">
                                                    <b>{{ $row['methodsCount'] }}</b> methods
                                                    @if ($row['type'] === 'Controllers')
                                                        (
                                                        <b>{{ $row['actionsCount'] }}</b> actions +
                                                        <b>{{ $row['methodsCount'] - $row['actionsCount'] }}</b>
                                                        non-actions
                                                        )

                                                    @endif
                                                    <b>{{ $row['documentedMethodsCount'] }}</b> documented
                                                </a>
                                            </div>
                                            <div class="modal fade" id="{{$classSlug}}" tabindex="-1"
                                                 aria-labelledby="{{$classSlug}}__head" aria-hidden="true">
                                                <div class="modal-dialog" style="max-width: 1280px;">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="{{$classSlug}}__head">
                                                                <b>{{ $row['shortName'] }}</b>@if ($row['parent'])
                                                                    <i>extends {{ $row['parent'] }}</i>
                                                                @endif
                                                            </h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-striped">
                                                                <tbody>
                                                                @foreach ($row['methods'] as $method)
                                                                    <tr>
                                                                        <td>{{$loop->index + 1}}.</td>
                                                                        <td>
                                                                            @if ($method['action']['found'])
                                                                                <b>{{ $method['action']['methods'] }}</b>
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            @if ($method['action']['found'])
                                                                                <span
                                                                                    title="{{$method['action']['uri']}}">
                                                                        <a href="{{url($method['action']['uri'])}}"
                                                                           target="_blank">
                                                                            {{ $method['action']['uri'] }}
                                                                        </a>
                                                                    </span>
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            @if($method['doc'])
                                                                                <div
                                                                                    id="doc__{{ $classSlug }}__{{$method['name']}}">
                                                                        <pre
                                                                            class="doc-comment">{{ $method['doc'] }}</pre>
                                                                                </div>
                                                                            @endif
                                                                            <a href="{{ $method['phpstormLink'] }}">
                                                                                {{ implode(' ', $method['access']) }}
                                                                                <b>{{ $method['name'] }}</b>
                                                                                (<b>{{$method['numParams']}}</b> params)
                                                                            </a>
                                                                        </td>
                                                                        <td>
                                                                            <b class="{{ $method['location']['isTooLarge'] ? 'too-large' : '' }}">{{$method['location']['size']}}</b>
                                                                            lines
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
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
