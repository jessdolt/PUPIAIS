<?php 
    //DB Params
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '12345');
    define('DB_NAME', 'pupiais');


    //App Root
    define('APPROOT',dirname(dirname(__FILE__)));
    define('IMAGEROOT', dirname(dirname(dirname(__FILE__))). '\public\uploads\\');
    define('CLOGOROOT', dirname(dirname(dirname(__FILE__))). '\public\company_logo\\');
    
    //Url Root
    define('URLROOT', 'https://pupiais.herokuapp.com/');
    
    //Site Name
    define('SITENAME', 'PUPIAIS');

    // DateTime Default
    date_default_timezone_set('Asia/Manila');