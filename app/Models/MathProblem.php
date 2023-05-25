<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MathProblem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'task',
        'solution',
        'image',
        'file_id'
    ];

    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'math_problem_user')
                    ->withTimestamps()
                    ->withPivot('is_submitted');
    }
}
