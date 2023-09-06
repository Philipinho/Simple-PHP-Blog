<?php
/* Database credentials.*/
define('DB_TYPE', 'mysql');         // NOT USED
define('DB_SERVER', 'LOCALHOST');   // Server name/IP for the mysql server
define('DB_USERNAME', 'USERNAME');  // What username to log in with
define('DB_PASSWORD', 'PASSWORD');  // What password to use when logging in
define('DB_NAME', 'MySimpleBlog');  // What is the database we are using
define('DB_CHARSET', 'utf8');       // What character set are we using

/* Define some settings for the blog */
define('SITE_ROOT', ''); // If installed on a sub-folder. E.g. if installed to 'www.example.com/blog', enter 'blog' for SITE_ROOT
define('PAGINATION', 10); // Pagination results per page
define('DEBUG_MODE', 1); // Turns on all debug errors 