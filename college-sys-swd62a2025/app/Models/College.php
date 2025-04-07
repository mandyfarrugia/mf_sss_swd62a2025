<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

/* In fulfillment of Branch 7 - Eloquent ORM.
 * Dealing with the database directly is generally considered bad practice.
 * In order to commit transactions (in this case, to perform CRUD operations on the Colleges table).
 * Therefore, the College model class will serve as an intermediary to add new colleges, as well as modify and delete existing colleges. */
class College extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address']; //Applied mass assignment to be enable the creation of a new college by sending data in the form an associative array. id() and timestamps() are not included as they are auto-generated by Laravel.

    /**
     * This function defines a one-to-many relationship between College and Student model classes.
     * Subsequently, this will allow the use of Eloquent queries to get all students enrolled to a particular college.
     * @return HasMany This type of relationship suggests a one-to-many relationship, with the College model class representing the one part of the relationship.
     */
    public function students(): HasMany {
        return $this->hasMany(Student::class); //Established a one-to-many relationship between colleges and students. A college can have many students, but a student can only belong to one college.
    }
}