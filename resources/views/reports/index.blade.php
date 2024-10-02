@extends('layouts.hod')
@section('content')
<div class="container">
    <h4 class="display-6 fs-4">Projects Overview</h4>
    @include('includes.message');
    <table id="projectsTable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Fund Allocation</th>
                <th>Picture</th>
                <th>Attachment</th>
                <th>Department</th>
                <th>Coordinator</th>
                <th>Action</th>
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
                    <a href="{{ asset('storage/projects/' . $project->projectpicture) }}"
                        download="{{ $project->projectpicture }}_Image.jpg">
                        Download Image
                    </a>
                    @else
                    No image
                    @endif
                </td>
                <td>
                    @if($project->projectreport)
                    <a href="{{ asset('storage/projects/' . $project->projectreport) }}"
                        download="{{ $project->name }}_Report.pdf">
                        Download Report
                    </a>
                    </a>
                    @else
                    No Attachment
                    @endif
                </td>
                <td>{{ $project->department->name }}</td>
                <td>{{ $project->user->username }}</td>
                <td>
                    <!-- Dropdown with only icon -->
                    <div class="dropdown">
                        <a href="#" class="text-primary" id="dropdownMenuIcon{{ $project->id }}"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuIcon{{ $project->id }}">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#viewModal{{ $project->id }}">
                                    <i class="bi bi-eye-fill"></i> View</a></li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#updateModal{{ $project->id }}">
                                    <i class="bi bi-pencil-square"></i> Add Comment</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            <!-- Print Modal -->
            <div class="modal fade" id="viewModal{{ $project->id }}" tabindex="-1"
                aria-labelledby="viewModalLabel{{ $project->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewModalLabel{{ $project->id }}">Report Details</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="report-container">
                                    <div class="col-md-12">
                                        <div class="header-section text-center">
                                            <h1>PROGRESS REPORT TEMPLATE</h1>
                                            <p>Project Title: <strong>{{$project->name }}</strong></p>
                                            <p class="sub-text">Contact Detail: [{{$project->user->phone }}]</p>
                                            <div class="image-container">
                                                <img src="{{asset('storage/projects/' . $project->projectpicture) }}"
                                                    alt="Project Image" class="img-responsive">
                                            </div>
                                        </div>
                                        <div class="body-section">
                                            <p><strong>Start Date:</strong> {{$project->startdate ?
                                                $project->startdate->format('Y-m-d') : 'N/A' }}</p>
                                            <p><strong>End Date:</strong> {{ $project->enddate ?
                                                $project->enddate->format('Y-m-d') : 'N/A' }} </p>
                                            <p><strong>Published by:</strong> Project Manager Name (Company)</p>
                                            <p><strong>Fund(s):</strong> {{ $project->fundallocation }}</p>
                                            <br>
                                            <p><strong>Contributions:</strong> {{ $project->department->name }}
                                                Department</p>
                                            <p><strong>Fullname:</strong> {{ $project->user->username }}</p>
                                            <div class="lead fs-5 ">
                                                <p class=" text-white" style=" background-color: #407dbf;">Progress
                                                    Report Description</p>
                                                <p>{{ $project->progressreport }}</p>
                                            </div>
                                        </div>
                                        <div class="footer mt-2 text-center">
                                            <p>Page 1 of 1</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-custom" data-bs-dismiss="modal">Close</button>
                            <button type="button" style=" background-color: #407dbf;" class="text-white  btn bg-custom"
                                onclick="printModalContent('viewModal{{ $project->id }}')">Print</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Update Modal -->
            <div class="modal fade" id="updateModal{{ $project->id }}" tabindex="-1"
                aria-labelledby="updateModalLabel{{ $project->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateModalLabel{{ $project->id }}">Add Comment to: <br>{{ $project->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('comments.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="body" class="form-label text-primary">Comment</label>
                                    <textarea class="form-control" name="body" rows="4" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="comment_date" class="form-label">Comment Date</label>
                                    <input type="date" class="form-control text-success" name="comment_date" value="{{ now()->format('Y-m-d') }}" required>
                                </div>
                                <input type="hidden" name="project_id" value="{{ $project->id }}">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <div class="mb-3">
                                    <label for="users">Leave a Comment To</label>
                                    <i class="bi bi-person mx-4 text-warning"></i>
                                    <input type="text"  class="bg-custom border-0 form-control" name="comment_to" value="{{ $project->user->username }}">
                                </div>
                               
                                
                                <button type="submit" style="background-color: #407dbf;" class="btn btn-primary bg-custom">Submit Comment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>
<script src="assets/js/custom.js"></script>
@endsection