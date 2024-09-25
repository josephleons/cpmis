@extends('layouts.hod')
@section('content')
<div class="row mt-5">
    <div class="col-md-4 offset-md-2">
        <div class="card card-custom">
            <div class="header-area">
                <h5><i class="fas fa-tachometer-alt dashboard-icon"></i>Dashboard</h5>
            </div>
                <div class="card-body">
                    <h5 class="card-title">Project Reports</h5>
                    <div class="pl-3">
                        <p><strong>Download Report </strong> 
                            <span class="float-right">
                                <i class="fas fa-project-diagram">
                                    <span class="badge bg-custom">{{ $totalReport }}</span>
                                </i>
                            </span>
                        </p>
                        <p><strong>View Report</strong> <span class="float-right">0</span></p>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection