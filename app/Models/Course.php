<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    //
    use HasFactory, SoftDeletes;

    // cara pertama dalam mempersiapkan mass assignment
    protected $fillable = [
        'name',
        'slug',
        'about',
        'path_trailer',
        'thumbnail',
        'teacher_id',
        'category_id',
    ];
    
}