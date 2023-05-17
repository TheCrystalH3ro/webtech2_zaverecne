<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    public function scopeActive(Builder $query)
    {
        $query->where(function (Builder $query) {
            $query->whereNull('start_date')
                ->orWhereDate('start_date', '<=', now());
        })
        ->where(function (Builder $query) {
            $query->whereNull('end_date')
                ->orWhereDate('end_date', '>=', now());
        });
    }
}
