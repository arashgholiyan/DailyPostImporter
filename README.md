
# Project Title

This Project showcases my first time using Laravel.

The project details:
- Every 24 hours using Task Scheduler (Windows) or Cron (Linux) looks for Jobs in my laravel app.
- Uses an api to store some data in the variable $posts.
- Stores 50 of them in the database (MySQL)

# Installation

The Installation proces was a bit overwhelming considering how I had to install XAMPP and Composer.
After Installing those and setting up my Environment Variables.

Most important thing in setting up Composer for laravel is the fact that in the Laravel 11 the composer dosen't need you to add it to the environment variables.

# some additional info

name of the database I created in MySQL
```
DB_DATABASE= = postbot_db
```

The magic happens in the FetchPostsJob.php file in the PostBot/app/Jobs/

Another thing to keep in mind is that in Laravel 11 the Console directory doesn't exist so you have to manually create it and add your Kernel.php file there. you can see the following link explains it perfectly:
https://medium.com/@jayprakashj/there-is-no-app-console-kernel-php-file-in-laravel-11-a8d64df86a1f
