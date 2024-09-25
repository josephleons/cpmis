<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'phone',
        'password',
        'password_changed',
        'role_id',
        'department_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
   

    // Check user role
    public function superadmin(){
        return $this->role()->where('name','superadmin')->exists();
    }
//    check client roles
    public function facilityadmin(){
        return $this->role()->where('name','facility')->exists();
    }
    public function hod(){
        return $this->role()->where('name','hod')->exists();
    }
}
