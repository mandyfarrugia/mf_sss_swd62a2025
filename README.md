# College and Student Management System 
## Steps covered so far
- ```git checkout -b b1-database-setup```
- ```composer create-project laravel/laravel=10 college-sys-swd62a2025```
- **Moment of truth:** ```php artisan serve --host 0.0.0.0 --port 8000```
- ```sudo mysql -u root -p```
- ```CREATE DATABASE college_system;```
- ```GRANT ALL ON college_system.* TO 'mandyfarrugia'@'%';```
- ```FLUSH PRIVILEGES;```