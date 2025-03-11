<?php

namespace App\Models;

use App\Models\College;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'dob', 'college_id']; //Applied mass assignment to be enable the creation of a new student by sending data in the form an associative array. id() and timestamps() are not included as they are auto-generated by Laravel.

    public function college(): BelongsTo {
        return $this->belongsTo(College::class); //Established a one-to-many relationship between colleges and students. A college can have many students, but a student can only belong to one college.
    }
}
