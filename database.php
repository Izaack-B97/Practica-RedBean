<?php 
    require_once __DIR__ . '/lib/RedBeanPHP5_7-mysql/rb-mysql.php';
    R::setup( 
        'mysql:host=localhost;dbname=redbean', 
        'root', 
        'root' 
    );
?>