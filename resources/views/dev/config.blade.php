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
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped config-table">
                    <tbody>
                    @foreach ($result as $key => $value)
                        @php($title = "config(\"$key\") [Click to copy]")
                        <tr>
                            <td data-key="{{ $key }}"
                                class="key"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="{{ $title }}">
                                {{ $key }}
                            </td>
                            <td>{{ $value }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        $(document).on('click', '.config-table tr td.key', function () {
            let key = $(this).data('key');
            let str = 'config("' + key + '")';
            console.log(str);
        });
    </script>

    <style>
        .config-table tr td.key {
            cursor: pointer;
        }
    </style>
@endsection
