@extends('layouts.admin')
@section('content')
<div class="container pt-5">
    <h4 class="display-6 fs-4">Current User details</h4>
    <table id="projectsTable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>E-mail</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Department</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->department->name }}</td>
                <td>{{ $user->role->name }}</td>
                <td>
                    <!-- Dropdown with only icon -->
                    <div class="dropdown">
                        <a href="#" class="text-primary" id="dropdownMenuIcon{{ $user->id }}"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuIcon{{ $user->id }}">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#viewModal{{ $user->id }}">
                                <i class="bi bi-eye-fill"></i> View</a></li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#updateModal{{ $user->id }}">
                                <i class="bi bi-pencil-square"></i> Update</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
             <!-- Update Modal -->
             <div class="modal fade" id="updateModal{{ $user->id }}" tabindex="-1" aria-labelledby="updateModalLabel{{ $user->id }}" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="updateModalLabel{{ $user->id }}">Update user: {{ $user->username }}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('users.update', $user->id) }}" method="POST">
                          @csrf
                          <div class="mb-3">
                              <label for="name" class="form-label">Username</label>
                              <input type="text" class="form-control" name="username" value="{{ $user->username }}" required>
                          </div>
                          <div class="mb-3">
                              <label for="startdate" class="form-label">E-mail</label>
                              <input type="text" class="form-control" name="email" value="{{ $user->email }}" required>
                          </div>
                          <div class="mb-3">
                              <label for="enddate" class="form-label">Phone</label>
                              <input type="text" class="form-control" name="phone" value="{{ $user->phone}}">
                          </div>
                          <div class="mb-3">
                              <label for="user_id" class="form-label">Role</label>
                              <input type="text" class="form-control" name="user_id" value="{{ $user->role->name }}" required>
                          </div>
                          <button type="submit" style="background-color: #407dbf;" class="btn btn-primary bg-custom">Update user</button>
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