@extends('dev.layout')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    Vendor
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <tbody>
                    @foreach ($result as $name => $dep)
                        <tr class="dep-{{$dep['type']}}">
                            <td>
                                @if ($dep['type'] === 'package')
                                    <a href="{{ $dep['url'] }}" target="_blank">
                                        {{ $name }}
                                    </a>
                                @elseif ($dep['type'] === 'extension')
                                    @if ($dep['loaded'])
                                        <span class="badge bg-success">loaded</span>
                                    @else
                                        <span class="badge bg-warning">not loaded</span>
                                    @endif
                                    {{ $name }}
                                @else
                                    {{ $name }}
                                @endif
                            </td>

                            <td>
                                {{ $dep['version'] }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        tr.dep-extension {
            color: red !important;
        }

        tr.dep-package {
            color: blue !important;
        }

        tr.dep-library {
            color: green !important;
        }

        tr.dep-php {
            font-weight: bold;
        }
    </style>
@endsection
