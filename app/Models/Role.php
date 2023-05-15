<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    public static $STUDENT = "student";
    public static $TEACHER = "teacher";

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
