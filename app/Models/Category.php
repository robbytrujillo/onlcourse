<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    //
    use HasFactory, SoftDeletes;

    // cara pertama dalam mempersiapkan mass assignment
    protected $fillable = [
        'name',
        'slug',
        'icon',
    ];

    // cara kedua, tapi user dapat memasukkan apa saja yang dapat membahayakan sistem
    protected $guarded = [
        'id',
    ];

    public function courses() {
        return $this->hasMany(Course::class);
    }
}