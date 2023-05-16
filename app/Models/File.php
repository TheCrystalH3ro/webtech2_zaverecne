<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title'
    ];

    public function mathProblems()
    {
        return $this->hasMany(MathProblem::class);
    }

    public function getTitle() {
        return pathInfo($this->title, PATHINFO_FILENAME);
    }
}
