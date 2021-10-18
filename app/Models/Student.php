<?php

namespace App\Models;

use App\Models\Major;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model implements Authenticatable
{
    use HasFactory, AuthenticableTrait;

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    protected $guarded = [];

}
