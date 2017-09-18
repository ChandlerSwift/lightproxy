@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Recent Accesses</div>
                <div class="panel-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Date</th>
                                <th>URL</th>
                            </tr>
                            @foreach($logs as $log)
                            <tr>
                                <td>{{ $log->created_at->toDayDateTimeString() }}</td>
                                <td>{{ $log->url }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $logs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
