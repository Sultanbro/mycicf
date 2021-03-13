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
                ...
            </div>
        </div>
    </div>
@endsection
