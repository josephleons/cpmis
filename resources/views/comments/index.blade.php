@extends('layouts.hod')
@section('content')
<div class="container">
    <h4 class="display-6 fs-4">Comment List</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Body</th>
                <th>Comment Date</th>
                <th>Project Description</th>
                <th>Commented To</th>
                <th>Commented By</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
            <tr>
              
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->body }}</td> 
                <td>{{ $comment->comment_date}}</td>
                <td>{{ $comment->project->name }}</td>
                <td>{{ $comment->comment_to }}</td>
                <td>{{ $comment->user->username }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection