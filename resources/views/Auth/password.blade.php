@extends('layouts.login')
@section('content')
<div class="container mt-5">
    @include('includes.message')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Change Your Password</div>

                <div class="card-body">
                    <form action="{{ route('Auth.password') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn text-white" style="  background-color: #2d4a84;">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
