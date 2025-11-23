<?php
    require_once (ROOT . './libs/rb-mysql.php');

try {
    R::setup( 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
        DB_USER, DB_PASS );

    if(!R::testConnection()){
        throw new Exception("Failed to connect to database.");
    }

} catch (PDOException $e) {
    echo('Fatal error: ' . $e->getMessage());
}




