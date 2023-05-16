<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function mathProblems()
    {
        return $this->hasMany(MathProblem::class);
    }
}
