# Simple-PHP-Blog
Simple blog system for personal development using procedural PHP and MYSQL.

For educational purposes only.

# Setup

Update the `connect.php` file with your database credentials.  
Import the `database.sql` file.  

If installed on a sub-folder, edit the `config.php` and replace the empty constant with the folder's name.  

The pagination results per page can be set on the `config.php` file.  

### URL Rewrite
The latest update introduces 'slugs', also known as 'SEO URLs'.   
After you update to the latest version, click on the "Generate slugs (SEO URLs)" button on the admin dashboard and slugs will be generated for all existing posts.   

The blog posts URL structure is like this: `http://localhost/p/4/apple-reveals-apple-watch-series-7`   

If you use Apache, enable the Apache rewrite module for the .htaccess rewrite rule to work.

If you use NGINX, you can insert something similar to the code below in your NGINX configuration block.      
```
location / {
    rewrite ^p/(.*) view.php?id=$1;
}
```

# Default Admin Login
Username: admin  
Password: 12345   

There is no way to update the admin password through the dashboard yet.  
To change your password, hash your password with PHP's `password_hash()` function. Then update the database value with the new password hash.   

# Screenshots

![screenshot_01](https://user-images.githubusercontent.com/16838612/66112823-78d32e00-e5c3-11e9-9b38-93ba488071e0.jpg)
![screenshot_02](https://user-images.githubusercontent.com/16838612/66112874-8d172b00-e5c3-11e9-97e4-590da5675100.jpg)
