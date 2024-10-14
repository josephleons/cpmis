<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
   
       $comments = Comment::with('project','user')->get();
       $users = User::all();
       $project =Project::all();
       return view('comments.index', compact('comments','users','project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|string',
            'comment_date' => 'required|date',
            'project_id' => 'required|integer|exists:projects,id',
            'comment_by' => 'required|string',
            'user_id' => 'required|integer|exists:users,id',
        ]);
        
        // Create New Comment Instance 
        $comment = new Comment();
        $comment->body = $request->input('body');
        $comment->comment_date = $request->input('comment_date');
        $comment->project_id = $request->input('project_id');
        $comment->user_id = $request->user_id;
        $comment->comment_by = $request->input('comment_by');
          // Save the comment to the database
          $comment->save();

          return redirect()->back()->with('success', 'Comment added successfully!');
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
