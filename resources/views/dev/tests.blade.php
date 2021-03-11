<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Code analyze</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
            crossorigin="anonymous"></script>

    <link rel="stylesheet"
          href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.6.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous"></script>
</head>

<body>
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
                        <h2 class="test-header" data-bs-toggle="collapse" data-bs-target="#{{ $id }}">
                            {{ $testName }}
                        </h2>
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
                                        {{ $name }}
                                        @if(!empty($mw)) <a href="{{ $mw['phpstormLink'] }}">{{$mw['file']}}:{{$mw['line']}} </a>@endif
                                    </li>
                                @endforeach
                            </ul>

                            <h4>Timing: <span class="duration" data-value="{{ $info['time']['duration'] }}"></span></h4>

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
                                <span class="duration" data-value="{{ $info['queries']['allQueriesDuration'] }}"></span>
                            </h4>

                            <ul>
                                @foreach ($info['queries']['timings'] as $key => $data)
                                    <li>
                                        {{ $key }}: {{ $info['queries']['counts'][$key] }} <span class="duration"
                                                                                                 data-value="{{ $data }}"></span>
                                    </li>
                                @endforeach
                            </ul>

                            <table class="table table-striped table-hover">
                                <tbody>
                                @foreach ($info['queries']['preparedQueries'] as $queryKey => $query)
                                    @php($querySlug = Str::slug('query' . $queryKey . '_' . $query['query']['sql']))
                                    <tr>
                                        <td>{{$query['type']}}</td>
                                        <td>
                                            <span class="duration" data-value="{{$query['query']['duration']}}"></span>
                                        </td>
                                        <td>
                                            <pre  class="query-row" data-bs-toggle="collapse" data-bs-target="#{{$querySlug}}"><code class="sql">{{$query['query']['sql']}}</code></pre>
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


    .route {}

    .route .methods {
        // color: #198754;
        font-weight: bold;
    }

    .route .url {
        // color: #ffc107;
        font-style: italic;
    }

    .route .alias {
        // color: #0d6efd;
        font-style: italic;
    }
</style>

<script>

    function timeStr(val) {
        if (val >= 1) {
            return {
                className: ['badge', 'bg-danger'],
                value: (val) + 's'
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
                className: [],
                value: '0'
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

</body>
</html>
