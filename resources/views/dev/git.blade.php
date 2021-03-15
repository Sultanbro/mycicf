@extends('dev.layout')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>Remote URL</td>
                        <td>
                            <a href="{{ $url }}" target="_blank">{{ $url }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Branch</td>
                        <td>
                            <a href="{{ $currentBranchUrl }}" target="_blank">
                                {{ $currentBranch }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Last commit</td>
                        <td>
                            <pre>@foreach ($lastCommitMessage['message'] as $line){{ $line . "\n" }}@endforeach</pre>
                            <a href="{{ $lastCommitMessage['url'] }}" target="_blank">
                                See the commit
                            </a>
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
                <h1>Remote Branches</h1>

                <table class="table table-striped">
                    <tbody>
                    @foreach ($remoteBranches as $index => $branch)
                        <tr>
                            <td>{{ $index + 1 }}.</td>
                            <td>
                                <a href="{{ $branch['url'] }}" target="_blank">
                                    @if($branch['head'])
                                        <i>HEAD -></i>
                                    @endif
                                    {{ $branch['name'] }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
