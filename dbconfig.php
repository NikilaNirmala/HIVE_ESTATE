<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'hive_app');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8');

function initDB()
{
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

        $pdo = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // Enable exceptions for errors
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC  // Fetch as associative array
        ]);
        // echo 'sucess';
        return $pdo;

        // echo "Database connection successful!";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit;
    }
}
