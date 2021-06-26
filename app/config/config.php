<?php 
    //LOCAL DB (PHPMYADMIN)
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '12345');
    define('DB_NAME', 'pupiais');

    //REMOTE DB (LIVE) 
    // define('DB_HOST', 'us-cdbr-east-04.cleardb.com');
    // define('DB_USER', 'b5ff9e87820ed4');
    // define('DB_PASS', 'cfda578d');
    // define('DB_NAME', 'heroku_94e582ab40677b7');

    //for presentation
    // define('DB_HOST', 'us-cdbr-east-04.cleardb.com');
    // define('DB_USER', 'bdc0d073cdccf6');
    // define('DB_PASS', 'd4a05ee7');
    // define('DB_NAME', 'heroku_84c25b156483496');

    //REmote mysql phpmyadmin
    // define('DB_HOST', 'remotemysql.com');
    // define('DB_USER', '9GFORLkQnc');
    // define('DB_PASS', 'Eu9w3bOVNq');
    // define('DB_NAME', '9GFORLkQnc');

    //App Root
    define('APPROOT',dirname(dirname(__FILE__)));
    define('IMAGEROOT', dirname(dirname(dirname(__FILE__))). '\public\uploads\\');
    define('CLOGOROOT', dirname(dirname(dirname(__FILE__))). '\public\company_logo\\');
    
    //Url Root
    define('URLROOT', 'http://localhost/pupiais'); 
    //http://localhost/pupiais

    //define('URLROOT', 'https://pupiais.herokuapp.com'); 
    //https://pupiais.herokuapp.com
    
    //Site Name
    define('SITENAME', 'PUPIAIS');

    // DateTime Default
    date_default_timezone_set('Asia/Manila');