<?php
define('DB_SERVEUR', 'localhost'); // Use 'localhost' as the server address
define('DB_NOM', 'EyeLenses'); // Name of the database
// Data Source Name: driver + server address + database name + charset
define('DB_DSN', 'mysql:host=' . DB_SERVEUR . ';dbname=' . DB_NOM . ';charset=utf8');
define('DB_LOGIN', 'root'); // Login
define('DB_PASSWORD', ''); // Password (empty if not set in XAMPP)
global $oPDO; // Global variable for use in methods
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Error handling through PDOException class exceptions
    PDO::ATTR_EMULATE_PREPARES => false, // Non-emulated statement preparation
];
$oPDO = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD, $options);
?>
