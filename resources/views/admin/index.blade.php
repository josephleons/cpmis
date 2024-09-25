@extends('layouts.admin')
@section('content')
<div class="row mt-5">
    <div class="col-md-4 offset-md-2">
        <div class="card card-custom">
            <div class="header-area">
                <h5><i class="fas fa-tachometer-alt dashboard-icon"></i> Dashboard</h5>
            </div>
            <div class="card-body">
                <h5 class="card-title">User Registration</h5>
                <div class="pl-3">
                    <!-- Using Bootstrap badge to display the count inside the icon -->
                    <p><strong>New Registration Users</strong>
                        <span class="float-right">
                            <i class="fas fa-user-plus">
                                <span class="badge bg-custom">{{ $totalUsers }}</span>
                            </i>
                        </span>
                    </p>
                    <p style="color: #00b5ad;"><strong>Active</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection