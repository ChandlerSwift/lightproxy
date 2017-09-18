@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User</div>
                <div class="panel-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>User</th>
                                <th>Accesses</th>
                                <th>Since</th>
                                <th></th>
                            </tr>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->logs->count() }}</td>
                                <td>{{ $user->created_at->toFormattedDateString() }}</td>
                                <td><a href="{{ url('/admin/users/' . $user->id . ($user->has_light_permission ? "/deauthorize" : "/authorize")) }}">
                                    {{ $user->has_light_permission ? "Deauthorize" : "Authorize" }}
                                </a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
