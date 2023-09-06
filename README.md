# Simple-PHP-Blog
Simple blog system for personal development using procedural PHP and MySQLi. It allows you to create, edit, delete posts to get you started on your journey

For educational purposes only.

Setup
=====
1. Create a MySQL database on your MySQL server, take note of the details (username, password, database name, server name)
2. Import the `database.sql` file into the new database you created
3. Edit the `config.php` file
   1. Edit the MySQL details to match your SQL server login details (e.g. server name, username, password, database)
   2. Edit the `SITE_ROOT` if you are putting it in a folder/sub-directory (e.g. www.example.com/myblog/, you would enter 'myblog' there)
   3. _OPTIONAL_ Change the number of blog posts to show per page with the `PAGINATION` option
   4. _OPTIONAL_ Set the `DEBUG_MODE` option to `true` if you want/need to see any and all errors
4. Upload all the files to your web server
5. Go to your new site (e.g. www.example.com/myblog/)

### URL Rewrite
The system now uses **slugs**, also known as **SEO URLs**

The blog posts URL structure is like this: `http://www.example.com/myblog/p/4/apple-reveals-apple-watch-series-7`, where the `p/4/apple-reveals-apple-watch-series-7` is the slug

#### Apache servers
There is an .htaccess file that has the required rewrite module and rule in the files.

#### Nginx servers
If you use NGINX, you can insert something similar to the code below in your NGINX configuration block.      
```
location / {
    rewrite ^p/(.*) view.php?id=$1;
}
```

Using the Simple-PHP-Blog
=====
The system is quite easy to use, as there isnt much work required to do a simple blog. If you are building your own from scratch this will give the head start that you need.

## Default Admin Login
Username: admin  
Password: 12345   

**__There is no way to update the admin password through the dashboard yet.__**
**__To change your password, hash your password with PHP's `password_hash()` function. Then update the database value with the new password hash.__**

## Screenshots

![screenshot_01](https://user-images.githubusercontent.com/16838612/66112823-78d32e00-e5c3-11e9-9b38-93ba488071e0.jpg)
![screenshot_02](https://user-images.githubusercontent.com/16838612/66112874-8d172b00-e5c3-11e9-97e4-590da5675100.jpg)
