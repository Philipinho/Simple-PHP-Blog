# Simple-PHP-Blog

This is a straightforward blog system built using procedural PHP and MySQL, designed for personal development and educational purposes.

## Setup

1. **Database Configuration**:
   - Update the `connect.php` file with your database credentials.

2. **Database Setup**:
   - Import the `newblog.sql` file into your MySQL database.

3. **Sub-Folder Configuration (Optional)**:
   - If the project is installed in a sub-folder, edit the `config.php` file and replace the empty constant with the folder's name.

4. **Pagination Configuration**:
   - Adjust the number of pagination results per page in the `config.php` file.

### URL Rewrite

The latest update introduces 'slugs' (also known as 'SEO URLs'). After updating to the latest version, click on the "Generate slugs (SEO URLs)" button on the admin dashboard to generate slugs for all existing posts.

The blog posts URL structure is as follows: `http://localhost/p/4/apple-reveals-apple-watch-series-7`

For Apache users, enable the Apache rewrite module for the .htaccess rewrite rule to work.

For NGINX users, insert something similar to the following code into your NGINX configuration block:

```
location / {
rewrite ^p/(.*) view.php?id=$1;
}
```

## Default Admin Login

- **Username**: admin
- **Password**: 12345

Currently, there is no built-in way to update the admin password through the dashboard. To change your password:
   1. Hash your new password with PHP's `password_hash()` function.
   2. Update the database value with the new password hash.

## Screenshots

![screenshot_01](https://user-images.githubusercontent.com/16838612/66112823-78d32e00-e5c3-11e9-9b38-93ba488071e0.jpg)
![screenshot_02](https://user-images.githubusercontent.com/16838612/66112874-8d172b00-e5c3-11e9-97e4-590da5675100.jpg)
