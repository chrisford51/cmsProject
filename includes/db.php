<?php

//Setup Array with DB info

$db['db_host'] = "localhost";
$db['db_user'] = "chrisdaw_admin";
$db['db_pass'] = "Fairburn123";
$db['db_name'] = "chrisdaw_cms";

//Loop through Array for set each value as an uppercase constant

foreach($db as $key => $value){
    define(strtoupper($key), $value);
}

// use looped info above to connect to DB. Setting connection variable so we can test later.

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Test as mentioned above
    // if($connection) {
    //     echo "We are connected.";
    // }



// Old Way
// $connection = mysqli_connect('localhost', 'chrisdaw_admin', 'Fairburn123', 'chrisdaw_cms');

// if($connection) {
//     echo "We are connected.";
// }
