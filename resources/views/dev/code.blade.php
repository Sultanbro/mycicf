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

</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover">
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
                    <table class="table table-striped table-hover report-table">
                        <tbody>
                        @foreach ($entry as $row)
                            <tr>
                                <td class="report-class">
                                    <a href="{{ $row['phpstormLink'] }}" data-bs-toggle="tooltip" title="{{ $row['class'] }}">
                                        {{ $row['shortName'] }}
                                    </a>
                                </td>
                                <td class="report-size">
                                    <b>{{ $row['location']['size'] }}</b> lines
                                </td>
                                <td class="report-methods">
                                    @php($classSlug = Str::slug($row['class']))
                                    @if(count($row['methods']))
                                        <div class="text-center">
                                            <a data-bs-toggle="collapse" href="#{{$classSlug}}" role="button"
                                               aria-expanded="false" aria-controls="collapseExample">
                                                <b>{{ $row['methodsCount'] }}</b> methods
                                                @if ($row['type'] === 'Controllers')
                                                    + <b>{{ $row['actionsCount'] }}</b> actions
                                                    = <b>{{ $row['methodsCount'] + $row['actionsCount'] }}</b>
                                                @endif
                                            </a>
                                        </div>
                                        <div class="collapse" id="{{$classSlug}}">
                                            <table class="table table-striped table-hover">
                                                <tbody>
                                                @foreach ($row['methods'] as $method)
                                                    <tr>
                                                        <td>{{$loop->index + 1}}.</td>
                                                        <td>{{ implode(' ', $method['access']) }}</td>
                                                        <td>{{ $method['isAction'] ? '[ACTION]' : '' }}</td>
                                                        <td>
                                                            <a href="{{ $method['phpstormLink'] }}">{{ $method['name'] }}</a>
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

</body>
</html>
