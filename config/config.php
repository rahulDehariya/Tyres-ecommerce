<?php

session_start();
ini_set('display_errors', '0');
date_default_timezone_set("Asia/Kolkata");
//define('accNum', '10328');
define('accNum', '12105');
define('DB_HOST', 'localhost');
//echo 11;
/*define('DB_USER', 'order');
define('DB_PASSWORD', 'PASSWORD');*/
// define('DB_USER', 'testingstaffstarr');
// define('DB_PASSWORD', 'STAFF@emocms');
// define('DB_DATABSE', 'testingstaffstarr');

// define('DB_USER', 'dbtest.test');
// define('DB_PASSWORD', 'DB@testP$13322');
// define('DB_DATABSE', 'dbtest');

 define('DB_USER', 'tyreadminstarr365');
 define('DB_PASSWORD', 'tyreadminstarr365@yahoogmailtype');
 define('DB_DATABSE', 'tyreadminstarr365starr365new_db');


define('HTTP_HOST', 'https://tyre.staffstarr.com/dealer/');
//server Api
// define('SERVER_APIURL', 'https://www.go.staffstarr.com/getData/server_action.php');

// define('SERVER_APIURL', 'https://www.tyre.admin.starr365.com/getData/server_action.php');


// define('SERVER_APIURL', 'http://hotel.staffstarr.com/jaxtyres/getdata/server_action.php');
 define('SERVER_APIURL', 'https://tyre.staffstarr.com/dealer/getdata/server_action.php');

define('SITE_PATH', '');
define('SITE_URL', HTTP_HOST.SITE_PATH);

$dirpath = dirname(dirname(__FILE__));
define('Dir_Path', $dirpath);
define('JS_PATH', SITE_URL.'assets/js/');
define('CSS_PATH', SITE_URL.'assets/css/');
define('IMAGE_PATH', SITE_URL.'assets/images/');

define('HTTP_HOST', 'https://tyre.staffstarr.com/dealer/');
define('SITE_PATH', '');
define('SITE_URL', HTTP_HOST.SITE_PATH);

$dirpath = dirname(dirname(dirname(__FILE__)));
define('Dir_Path', $dirpath);

define('PICKUP', 'true');//true or false
define('DELIVERY', 'true');//true or false
define('SELECTION_MUST', 'true');//true or false
define('IS_EXTRA_COMPULSORY', 'false');//true or false extra compulsory

define('CATEGORY_IMAGES_PATH', SITE_URL.'its-admin/assets/images/');
define('MENU_IMAGE_PATH', SITE_URL.'its-admin/assets/images/');
define('PROFILE_IMAGE_PATH', SITE_URL.'/assets/profile/');
define('currency', '$');
$servername = DB_HOST;
    $username = DB_USER;
    $password = DB_PASSWORD;
    $dbname = DB_DATABSE;
    $con=mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

