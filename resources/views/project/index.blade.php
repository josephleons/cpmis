@extends('layouts.facility')
@section('content')
<div class="container">
    <h4 class="display-6 fs-4">Projects Overview</h4>
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
                        <a href="{{ asset('storage/projects/' . $project->projectpicture) }}" download="{{ $project->projectpicture }}_Image.jpg">
                            Download Image
                        </a>
                    @else
                        No image
                    @endif
                </td>
                <td>
                    @if($project->projectreport)
                    <a href="{{ asset('storage/projects/'. $project->projectreport) }}" download="{{ $project->projectreport }}_Report.pdf">
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
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#updateModal{{ $project->id }}">
                                <i class="bi bi-pencil-square"></i> Update</a></li>
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
                                                <img src="{{asset('storage/projects/' . $project->projectpicture) }}" alt="Project Image" class="img-responsive">
                                            </div>
                                        </div>
                                        <div class="body-section">
                                            <p><strong>Start Date:</strong> {{$project->startdate ? $project->startdate->format('Y-m-d') : 'N/A' }}</p>
                                            <p><strong>End Date:</strong> {{ $project->enddate ? $project->enddate->format('Y-m-d') : 'N/A' }} </p>
                                            <p><strong>Published by:</strong> Project Manager Name (Company)</p>
                                            <p><strong>Fund(s):</strong> {{ $project->fundallocation }}</p>
                                            <br>
                                            <p><strong>Contributions:</strong> {{ $project->department->name }} Department</p>
                                            <p><strong>Fullname:</strong> {{ $project->user->username }}</p>
                                            <div class="lead fs-5 ">
                                                <p class=" text-white" style=" background-color: #407dbf;">Progress Report Description</p>
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
             <div class="modal fade" id="updateModal{{ $project->id }}" tabindex="-1" aria-labelledby="updateModalLabel{{ $project->id }}" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="updateModalLabel{{ $project->id }}">Update Project: {{ $project->name }}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('project.update', $project->id) }}" method="POST">
                          @csrf
                          <div class="mb-3">
                              <label for="name" class="form-label">Project Name</label>
                              <input type="text" class="form-control" name="name" value="{{ $project->name }}" required>
                          </div>
                          <div class="mb-3">
                              <label for="startdate" class="form-label">Start Date</label>
                              <input type="date" class="form-control" name="startdate" value="{{ $project->startdate->format('Y-m-d') }}" required>
                          </div>
                          <div class="mb-3">
                              <label for="enddate" class="form-label">End Date</label>
                              <input type="date" class="form-control" name="enddate" value="{{ $project->enddate ? $project->enddate->format('Y-m-d') : '' }}">
                          </div>
                          <div class="mb-3">
                              <label for="fundallocation" class="form-label">Fund Allocation</label>
                              <input type="number" class="form-control" name="fundallocation" value="{{ $project->fundallocation }}" required>
                          </div>
                          <div class="mb-3">
                              <label for="department_id" class="form-label">Department</label>
                              <input type="number" class="form-control" name="department_id" value="{{ $project->department_id }}" required>
                          </div>
                          <div class="mb-3">
                              <label for="user_id" class="form-label">Coordinator</label>
                              <input type="number" class="form-control" name="user_id" value="{{ $project->user_id }}" required>
                          </div>
                          <button type="submit" style="background-color: #407dbf;" class="btn btn-primary bg-custom">Update Project</button>
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