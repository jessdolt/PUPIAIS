<?php 
    //DB Params
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '12345');
    define('DB_NAME', 'pupiais');

    //https://remotemysql.com/login.php
    // define('DB_HOST', 'us-cdbr-east-04.cleardb.com');
    // define('DB_USER', 'b9e84a4bdcd7c6');
    // define('DB_PASS', '2891ffd3');
    // define('DB_NAME', 'heroku_ec03275637a73ae');

    //App Root
    define('APPROOT',dirname(dirname(__FILE__)));
    define('IMAGEROOT', dirname(dirname(dirname(__FILE__))). '\public\uploads\\');
    define('CLOGOROOT', dirname(dirname(dirname(__FILE__))). '\public\company_logo\\');
    
    //Url Root
    define('URLROOT', 'http://localhost/pupiais'); 
    //http://localhost/pupiais

    // define('URLROOT', 'https://pupiais.herokuapp.com'); 
    //https://pupiais.herokuapp.com
    
    //Site Name
    define('SITENAME', 'PUPIAIS');

    // DateTime Default
    date_default_timezone_set('Asia/Manila');