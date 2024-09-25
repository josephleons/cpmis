@extends('layouts.admin')
@section('content')
<div class="container">
    <h1>Project Report</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Fund Allocation</th>
                <th>Picture</th>
                <th>Department</th>
                <th>Coordinator</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{ $project->name }}</td>
                <td>{{ $project->startdate->format('Y-m-d') }}</td>
                <td>{{ $project->enddate ? $project->enddate->format('Y-m-d') : 'N/A' }}</td>
                <td>{{ $project->fundallocation }}</td>
                <td>
                    @if($project->projectpicture)
                        <img src="{{ asset('storage/' . $project->projectpicture) }}" alt="Project Image" style="width:100px;height:auto;">
                    @else
                        No image
                    @endif
                </td>
                <td>{{ $project->department->name }}</td>
                <td>{{ $project->user->username }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection