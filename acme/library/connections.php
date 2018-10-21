<?php

/*
 * DATABASE CONNECTIONS
 */

function acmeConnect() {
    $server = "localhost";
    $database = "acme";
    $user = "iClient";
    $password = "RryhPkt2hxGNfvlQ";
    $dsn = 'mysql:host=' . $server . ';dbname=' . $database;
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    // Create the actual connection object and assign it to a variable
    try {
        $acmeLink = new PDO($dsn, $user, $password, $options);
//  echo '$acmeLink worked successfuly <br>';
        return $acmeLink;
    } catch (PDOException $exc) {
        header('location: /acme/view/500.php');
        exit;
    }
}

//acmeConnect();
