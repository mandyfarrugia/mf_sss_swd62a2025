# College and Student Management System 
## Steps covered so far

### Creation of Laravel project
- ```git checkout -b b1-database-setup```
- ```composer create-project laravel/laravel=10 college-sys-swd62a2025```
- **Moment of truth:** ```php artisan serve --host 0.0.0.0 --port 8000```

### Creation of database using MySQL via Git Bash Terminal
- ```sudo mysql -u root -p```
- ```CREATE DATABASE college_system;```
- ```GRANT ALL ON college_system.* TO 'mandyfarrugia'@'%';```
- ```FLUSH PRIVILEGES;```

### Updating database connection string in .env
- Assign ```DB_DATABASE``` to ```college_system```.
- Assign ```DB_USERNAME``` to ```mandyfarrugia```.
- Assign ```DB_PASSWORD``` to ```password```.

### Migrations
#### Migration dedicated to college entity
- ```php artisan make:migration create_colleges```
- Within ```up()``` > ```Schema::create('colleges', function (Blueprint $table)```, specify two user-defined attributes as follows:
    - ```$table->string('name')->nullable(false)->unique();``` (rather self-explanatory, represents the name of the college)
    - ```$table->string('address')->nullable(false);``` (represents where the college is based)
- Run ```php artisan migrate``` to inflict changes to the database schema in the light of the migration file comprising of instructions to embody a college entity.

##### Check that migration was successful
- Launch a new Git Bash terminal and run the command ```sudo mysql -u root -p```.
- Switch control to the ```college_system``` database via the command ```USE college_system;```.
- Check that the colleges table resides in said database via the command ```SHOW TABLES;```.
- Use the ```DESCRIBE colleges;``` command to check that all attributes have been specified with their respective constraints.

#### Migration dedicated to student entity
- ```php artisan make:migration create_students```
- Within ```up()``` > ```Schema::create('colleges', function (Blueprint $table)```, specify the following user-defined attributes:
    - ```$table->string('name')->nullable(false);```
    - ```$table->string('email')->nullable(false)->unique();```
    - ```$table->string('phone', 8)->nullable(false);``` (The second argument represents the maximum accepted characters of a string value to be stored into this attribute, which in this case was restricted to 8 as per phone number format standards)
    - ```$table->date('dob')->nullable(false);```
    - ```$table->foreignId('college_id')->constrained()->onDelete('cascade');``` (```cascade``` in this case denotes that when a college record is erased, then so are all its associated students as well)

##### Check that migration was successful
- Launch a new Git Bash terminal and run the command ```sudo mysql -u root -p```.
- Switch control to the ```college_system``` database via the command ```USE college_system;```.
- Check that the colleges table resides in said database via the command ```SHOW TABLES;```.
- Use the ```DESCRIBE students;``` command to check that all attributes have been specified with their respective constraints.

### Models
#### Creating the Student model
- ```php artisan make:model Student```
- ```use App\Models\College;```
- ```protected $fillable = ['name', 'email', 'phone', 'dob', 'college_id'];```
- Establish a one-to-many relationship between colleges and students by indicating that a student can be asssociated with a college as follows:
    ```
    public function college() { 
        return $this->belongsTo(College::class); 
    }
    ```

#### Creating the College model
- ```php artisan make:model College```
- ```use App\Models\Student;```
- ```protected $fillable = ['name', 'address'];```
- Establish a one-to-many relationship between colleges and students by indicating that a college can enroll many students as follows:
    ```
    public function students(): HasMany {
        return $this->hasMany(Student::class);
    }
    ```