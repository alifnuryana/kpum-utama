<?php

namespace App\Models;

use App\Models\Faculty;
use App\Models\Student;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Major extends Model
{
    use HasFactory;

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function committees()
    {
        return $this->hasMany(Committee::class);
    }

    protected $guarded = [];
}
