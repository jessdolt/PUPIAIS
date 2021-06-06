<?php 
    $db = new Database;

    $db->query('SELECT * FROM users');
    $row = $db->resultSet();
    array_print($row);

    
?> 