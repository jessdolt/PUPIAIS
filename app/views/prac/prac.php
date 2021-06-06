<?php array_print($data)?>


<?php 
    $db = new Database;

    $db->query('SELECT * FROM users');
    $row = $db->resultSet();
    array_print($row);

    
?> 


<?php 
    $db = new Database;

    $db->query('SELECT * FROM alumni');
    $row = $db->resultSet();
    array_print($row);

    
?> 



<?php 
    $db = new Database;

    $db->query('SELECT * FROM posts');
    $row = $db->resultSet();
    array_print($row);

    
?> 