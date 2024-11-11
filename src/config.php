<?php
    ini_set('error_reported', E_ALL);
    ini_set('display_errors', 1);

    session_start();

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'blog');
    define('DB_PREFIX', 'blog_');

    define('SECRET', '12345');
    define('DATE_FORMAT', 'd.m.Y H:i:s');

    define('USER', 0);
    define('ADMINISTRATOR', 1);

    set_include_path(get_include_path().PATH_SEPARATOR.'src');
    spl_autoload_register();
?>