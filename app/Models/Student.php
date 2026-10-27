<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'age',
        'image',
    ];
    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }


    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }
}
