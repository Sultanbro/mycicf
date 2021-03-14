@extends('dev.layout')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    {{count($data)}} Test Cases
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @foreach ($data as $testName => $info)
                    <div class="row">
                        <div class="col-md-12">
                            @php($id = Str::slug($testName))
                            <hr>
                            <h4 class="test-header" data-bs-toggle="collapse" data-bs-target="#{{ $id }}">
                                <b>
                                    [
                                    {{ $info['assertionCount'] }}
                                    {{ \Str::pluralStudly('assertion', $info['assertionCount']) }}
                                    ]
                                </b>
                                {{ $testName }}
                            </h4>
                            <div class="collapse multi-collapse p-left" id="{{ $id }}">
                                <h3>{{ $info['name'] }}</h3>

                                <p class="route">
                                    [<span class="methods">{{ $info['routes']['methods'] }}</span>
                                    <span class="url">/{{$info['routes']['uri']}}</span>]
                                    as <span class="alias">{{$info['routes']['routes']['as']}}</span></p>

                                <p>
                                    Passed {{ $info['assertionCount'] }} {{ \Str::pluralStudly('assertion', $info['assertionCount']) }}</p>

                                <h4>Middlewares: {{ count($info['routes']['middleware']) }}</h4>

                                <ul>
                                    @foreach($info['routes']['middleware'] as $name => $mw)
                                        <li>
                                            @if(!empty($mw))
                                                <a href="{{ $mw['phpstormLink'] }}">
                                                    {{ $name }}
                                                </a>
                                            @else
                                                {{ $name }}
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>

                                <h4>Timing: <span class="duration" data-value="{{ $info['time']['duration'] }}"></span>
                                </h4>

                                <table class="table table-striped table-hover">
                                    <tbody>
                                    @foreach ($info['time']['measures'] as $measure)
                                        <tr>
                                            <td>{{ $measure['label']['label'] }}:</td>
                                            <td>
                                                <span class="duration" data-value="{{ $measure['duration'] }}"></span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <h4>
                                    SQL Queries:
                                    {{count($info['queries']['queries'])}}
                                    <span class="duration"
                                          data-value="{{ $info['queries']['allQueriesDuration'] }}"></span>
                                </h4>

                                <div class="col-md-6">
                                    <table class="table table-striped">
                                        <tbody>
                                        @foreach ($info['queries']['timings'] as $key => $data)
                                            <tr>
                                                <td>{{ $key }}</td>
                                                <td>{{ $info['queries']['counts'][$key] }}</td>
                                                <td><span class="duration" data-value="{{ $data }}"></span></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <table class="table table-striped table-hover">
                                    <tbody>
                                    @foreach ($info['queries']['preparedQueries'] as $queryKey => $query)
                                        @php($querySlug = Str::slug('query' . $queryKey . '_' . $query['query']['sql']))
                                        <tr>
                                            <td>{{$query['type']}}</td>
                                            <td>
                                                <span class="duration"
                                                      data-value="{{$query['query']['duration']}}"></span>
                                            </td>
                                            <td>
                                            <pre class="query-row" data-bs-toggle="collapse"
                                                 data-bs-target="#{{$querySlug}}"><code
                                                    class="sql">{{$query['query']['sql']}}</code></pre>
                                                <div class="collapse multi-collapse" id="{{$querySlug}}">
                                                    <ul>
                                                        @foreach ($query['query']['backtrace'] as $item)
                                                            <li>
                                                                {{ $item['name'] }}:{{ $item['line'] }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <h4>Models interaction: {{ $info['models']['count'] }}</h4>
                                <ul>
                                    @foreach($info['models']['data'] as $item)
                                        {{ $item['name'] }}: {{ $item['count'] }}
                                    @endforeach
                                </ul>

                                <h4>Events: {{ $info['events']['count'] }}
                                    <span class="duration" data-value="{{ $info['events']['duration'] }}"></span>
                                </h4>

                                <table class="table table-striped table-hover">
                                    <tbody>
                                    @foreach ($info['events']['data'] as $item)
                                        <tr>
                                            <td>{{ $item['label'] }}</td>
                                            <td>
                                                <span class="duration" data-value="{{$item['duration']}}"></span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <h4>Cache {{ $info['cache']['count'] }}
                                    <span class="duration" data-value="{{ $info['cache']['duration'] }}"></span>
                                </h4>
                                <table class="table table-striped table-hover">
                                    <tbody>
                                    @foreach ($info['cache']['data'] as $item)
                                        <tr>
                                            <td>{{ $item['type'] }}</td>
                                            <td>{{ $item['label'] }}</td>
                                            <td>
                                                <span class="duration" data-value="{{ $item['duration'] }}"></span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <h4>Kias: {{ $info['kias']['count'] }}</h4>
                                <ul>
                                    @foreach($info['kias']['data'] as $item)
                                        <li>
                                            {{ $item['method'] }} ({{count($item['args'])}} args)
                                        </li>
                                    @endforeach
                                </ul>

                                <h4>Auth: {{ $info['auth']['names'] }} (#{{$info['auth']['user']}})</h4>

                                <hr>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <style>
        .query-row {

        }

        .query-trace {
            display: none;
        }

        .query-trace.visible {
            display: inherit;
        }

        [data-bs-toggle="collapse"] {
            cursor: pointer;
        }

        .p-left {
            padding-left: 30px;
        }


        .route {
        }

        .route .methods {
        / / color: #198754;
            font-weight: bold;
        }

        .route .url {
        / / color: #ffc107;
            font-style: italic;
        }

        .route .alias {
        / / color: #0d6efd;
            font-style: italic;
        }
    </style>

    <script>

        function timeStr(val) {
            if (val >= 1) {
                return {
                    className: ['badge', 'bg-danger'],
                    value: Math.round(val * 100) / 100 + 's'
                }
            }

            if (val >= 1 / 1000) {
                return {
                    className: ['badge', 'bg-warning'],
                    value: Math.round(val * 1000) + 'ms'
                }
            }

            if (val >= 1 / 1000 / 1000) {
                return {
                    className: ['badge', 'bg-success'],
                    value: Math.round(val * 1000 * 1000) + 'μs'
                }
            }

            if (val === 0) {
                return {
                    className: ['badge', 'bg-success'],
                    value: '0s'
                }
            }

            debugger;
            return {
                className: 'green',
                value: 'sandbox'
            };
        }

        $('span.duration').each(function () {
            let $this = $(this);
            let val = parseFloat($this.data('value'));
            let str = timeStr(val);
            $this.text(str.value).addClass(str.className);
        });

        $('.test-header').first().click();

        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('pre code').forEach((block) => {
                hljs.highlightBlock(block);
            });
        });
    </script>
@endsection
