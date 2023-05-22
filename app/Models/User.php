<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'role_id'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function sets() {
        return $this->belongsToMany(File::class, 'file_user');
    }

    public function availableSets() {
        return $this->sets()->availableForStudents($this);
    }

    public function mathProblems() {
        return $this->belongsToMany(MathProblem::class, 'math_problem_user')
                    ->withTimestamps()
                    ->withPivot('is_submitted');
    }

    public function submittedMathProblems() {
        return $this->mathProblems()
                    ->withPivot('is_correct')
                    ->withPivot('answer')
                    ->wherePivot('is_submitted', true);
    }

    public function unsubmittedMathProblems() {
        return $this->mathProblems()->wherePivot('is_submitted', false);
    }

    public function scopeStudents(Builder $query) {
        $query->whereHas('role', function ($query) {
            $query->where('name', Role::$STUDENT);
        });
    }

    public function getPoints() {

        $points = 0;

        foreach($this->submittedMathProblems as $mathProblem) {

            if(!$mathProblem->pivot->is_correct) {
                continue;
            }

            $points += $mathProblem->file->points;

        }

        return $points;
    }
}
