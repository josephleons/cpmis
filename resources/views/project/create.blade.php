@extends('layouts.facility')
@section('content')
<div class="container mt-5 pb-5">
    @include('includes.message')
    <div class="card">
        <div class="card-header">
            <h4 class="display-6 fs-4">New Project Entry Form</h4>
        </div>
        <div class="card-body m-2">
            <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="name" class="form-label">Project Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="startdate" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="startdate" name="startdate" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="enddate" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="enddate" name="enddate">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="fundallocation" class="form-label">Fund Allocation</label>
                        <input type="number" class="form-control" id="fundallocation" name="fundallocation" step="0.01"
                            required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="projectpicture" class="form-label">Project Picture</label>
                        <input type="file" class="form-control" id="projectpicture" name="projectpicture">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="progressreport" class="form-label">Progress Report</label>
                        <textarea class="form-control" id="progressreport" name="progressreport"></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="p_stages" class="form-label">Project Stages</label>
                        <input type="text" class="form-control" id="p_stages" name="p_stages">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="projectreport" class="form-label">Add Attachment</label>
                        <input type="file" class="form-control" id="projectreport" name="projectreport">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="department_id" class="form-label">Choose Department</label>
                            <select class="form-select" id="department_id" name="department_id" required>
                                <option value="">Select a department</option>
                                @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="user_id" class="form-label">Select Project Coordnator</label>
                            <select class="form-select" id="user_id" name="user_id" required>
                                <option value="">Select a user</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->username }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
        </div>
        <button type="submit" class="btn text-white" style="  background-color: #2d4a84;">Submit</button>
        </form>
    </div>
</div>
</div>
@endsection