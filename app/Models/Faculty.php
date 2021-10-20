<?php

namespace App\Models;

use App\Models\Major;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function majors()
    {
        return $this->hasMany(Major::class);
    }
}
