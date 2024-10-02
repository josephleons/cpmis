<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Project;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
     {
        // $userId = auth()->user()->id;
        $userId = Auth::id();
        $projects = Project::with(['department', 'user'])
                ->where('user_id',$userId)
                ->get();

        $departments = Department::all();  // Fetch all departments
        $users = User::all();  // Fetch all users
        return view('project.index', compact('projects', 'departments', 'users'));
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::with(['department', 'user'])->get();
        $departments = Department::all();  // Fetch all departments
        $users = User::all();  // Fetch all users
        return view('project.create', compact('projects', 'departments', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'startdate' => 'required|date',
            'enddate' => 'nullable|date|after_or_equal:startdate',
            'fundallocation' => 'required|numeric',
            'projectpicture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'department_id' => 'required|exists:departments,id',
            'user_id' => 'required|exists:users,id',
        ]);

            $project = new Project();
            $project->name = $request->name;
            $project->startdate = $request->startdate;
            $project->enddate = $request->enddate;
            $project->fundallocation = $request->fundallocation;
            $project->progressreport = $request->progressreport;
            $project->department_id = $request->department_id;
            $project->user_id = $request->user_id;

        
        if ($request->hasFile('projectpicture')) {
            $path = $request->file('projectpicture')->store('public/projects');
            // Store the path or filename in the database, depending on your requirement
            $project->projectpicture = basename($path); // Save only the file name
        }
        if ($request->hasFile('projectreport')) {
            $path = $request->file('projectreport')->store('public/projects');
            // Store the path or filename in the database, depending on your requirement
            $project->projectreport = basename($path); // Save only the file name
        }
        
        $project->save();
        return redirect()->back()->with('success', 'Project created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::findOrFail($id);
        return view('project.show', compact('project'));
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
        $project = Project::findOrFail($id);

        // Validate and update project data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'startdate' => 'required|date',
            'enddate' => 'nullable|date',
            'fundallocation' => 'required|numeric',
            'department_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        $project->update($validated);

        return redirect()->route('project.index')->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}
