@extends('layouts.facility')
@section('content')
<div class="row mt-5">
    <div class="col-md-4 offset-md-2">
        <div class="card card-custom">
            <div class="header-area">
                <h5><i class="fas fa-tachometer-alt dashboard-icon"></i>Dashboard</h5>
            </div>
            <div class="card-body">
                <h5 class="card-title fs-3">Project </h5>
                <div class="pl-3">
                    <p><strong>Project List</strong>
                        <span class="float-right">
                            <i class="fas fa-project-diagram">
                                <span class="badge bg-custom">{{ $totalProject }}</span>
                            </i>
                        </span>
                    <p><strong>Add New Project </strong> <span class="float-right">0</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection