@extends('layouts.facility')
@section('content')
<div class="container">
    <h4 class="display-6 fs-4">Comment List</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descriptions</th>
                <th>Comment Date</th>
                <th>Project Description</th>
                <th>Commented To</th>
                <th>Commented By</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comment as $com)
            <tr>
                <td>{{ $com->id }}</td>
                <td>{{ $com->body }}</td> 
                <td>{{ $com->comment_date}}</td>
                <td>{{ $com->project->name }}</td>
                <td>{{ $com->user->username }}</td>
                <td>{{ $com->comment_by }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection