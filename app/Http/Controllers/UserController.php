<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Project;
use App\Models\Department;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with(['department'])->get();
        $departments = Department::all();  // Fetch all departments
        // $projects = Project::all();  // Fetch all users
        return view('users.index', compact('departments', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $departments = Department::all(); // Fetch all roles to display in the form
        return view('users.create', compact('roles', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate the form inputs
         $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'department_id' => 'required|exists:departments,id'
        ]);

          // Create new user
          $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'phone' =>$request->phone,
            'password' => bcrypt($request->password),
            'department_id' => $request->department_id, 
            'role_id' => $request->role_id 
        ]);

        return redirect()->route('admin.index')->with('success', 'User created successfully!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
