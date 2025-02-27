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