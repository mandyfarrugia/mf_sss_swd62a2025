<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//This migration file represents the creation of the representation of a college entity.
return new class extends Migration
{
    /** 
     * When ```up()``` is executed (via the command ```php artisan migrate```), the below table structure will be created within the college_system database.
     * Apart from the built-in attributes such as ```id()``` and ```timestamps()``` (```created_at``` and ```updated_at```), 
     * two user-defined non-nullable attributes, the college name and the address in which the college is based, have been included. */
    public function up(): void
    {
        Schema::create('colleges', function (Blueprint $table) {
            $table->id(); //A primary key field used to uniquely identify each college record, also auto-incremented.
            $table->string('name')->nullable(false)->unique(); //If the nullable method is called with a falsy argument, the attribute will have a NOT NULL constraint. Alternatively, one can also omit the nullable method entirely to achieve the same result.
            $table->string('address')->nullable(false);
            $table->timestamps(); //Timestamps as to when a record was created and last updated will be recorded into this attribute.
        });
    }

    /** 
     * Changes to the database schema inflicted by up() are rolled back upon execution of down(), typically triggered by the commands ```php artisan migrate rollback:reset```/```php artisan migrate:rollback.``` */
    public function down(): void
    {
        Schema::dropIfExists('colleges'); //Delete the entire colleges table when down() is executed.
    }
};
