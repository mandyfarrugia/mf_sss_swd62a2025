# College and Student Management System 
## Steps covered so far
- ```git checkout -b b1-database-setup```
- ```composer create-project laravel/laravel=10 college-sys-swd62a2025```
- ```git commit -m "Created Laravel 10.x project which will focus on the step-by-step development of a college and student management system. The system assumes a one-to-many relationship between the college and its respective students. One college can accommodate many students. However, a student can only be associated with one college. Branches are dedicated to one specific task."```
- ```git push origin b1-database-setup```
- **Moment of truth:** ```php artisan serve --host 0.0.0.0 --port 8000```