<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $casts = [
        'startdate' => 'date',   // or 'datetime' depending on your needs
        'enddate' => 'date',     // or 'datetime'
    ];
    protected $fillable = [
        'name',
        'startdate',
        'enddate',
        'fundallocation',
        'projectpicture',
        'progressreport',
        'department_id',
        'user_id',
    ];
    /**
     * A project belongs to a department.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * A project belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
