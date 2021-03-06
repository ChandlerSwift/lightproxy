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
                                <th>User</th>
                            </tr>
                            @foreach($logs as $log)
                            <tr>
                                <td>{{ $log->created_at }}</td>
                                <td>{{ $log->url }}</td>
                                <td><a href="{{ url('/admin/users/' . $log->user->id) }}">{{ $log->user->name }}</a></td>
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
