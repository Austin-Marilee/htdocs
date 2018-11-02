<?php

/*
 * ACME CONTROLLER
 */

// Get the database connection file
require_once 'library/connections.php';
// Get the acme model for use as needed
require_once 'model/acme-model.php';
// Get the helper functions
require_once 'library/functions.php';

// Get the array of categories
$categories = getCategories();

$navList = buildNav($categories);

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'template':
        include 'template/template.php';
        break;
    default:
        include 'view/home.php';
}

