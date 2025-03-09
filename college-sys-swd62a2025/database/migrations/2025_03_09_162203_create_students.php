<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /** 
     * When ```up()``` is executed (via the command ```php artisan migrate```), the below table structure will be created within the college_system database.
     * Apart from the built-in attributes such as ```id()``` and ```timestamps()``` (```created_at``` and ```updated_at```), user-defined attributes representing what constitutes a student have been included. */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id(); //A primary key field used to uniquely identify each college record, also auto-incremented.
            $table->string('name')->nullable(false);
            $table->string('email')->nullable(false)->unique();
            $table->string('phone', 8)->nullable(false); //Second argument restricts text length to a maximum of 8 characters instead of the traditional 255 character limit.
            $table->date('dob')->nullable(false);
            $table->foreignId('college_id')->constrained()->onDelete('cascade'); //First step towards establishing an association between students and a college. cascade denotes that if a college record is deleted, all student records associated with that college will also be deleted.
            $table->timestamps();
        });
    }

    /** 
     * Changes to the database schema inflicted by up() are rolled back upon execution of down(), typically triggered by the commands ```php artisan migrate rollback:reset```/```php artisan migrate:rollback.``` */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
