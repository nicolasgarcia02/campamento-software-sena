<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['id', 'title', 'description', 'weeks', 'enroll_cost', 'minimum_skill', 'created_at', 'updated_at', 'bootcamp_id'];
    use HasFactory;
}
