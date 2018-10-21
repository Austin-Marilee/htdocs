<?php
/*
* Accounts Controller
*/

// Get the database connection file
   require_once '../library/connections.php';
// Get the acme model for use as needed
   require_once '../model/acme-model.php';
// Get the accounts model
   require_once '../model/accounts-model.php';

// Get the array of categories
$categories = getCategories();

// Build a navigation bar using the $categories array
$navList = '<button onclick="toggleNavMenu()">&#9776;</button> <ul class="hide mainmenu" id="primaryNav">';
$navList .= "<li><a href='/acme/index.php' title='View the Acme home page'>Home</a></li>";
foreach ($categories as $category) {
    $navList .= "<li><a href='/acme/index.php?action=" . urlencode($category['categoryName']) . "' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
}
$navList .= '</ul>';
// echo $navList;
//exit;

// Get the value from the action name - value pair
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
// Code to deliver the views will be here

case 'register':
// Filter and store the data
  $clientFirstname = filter_input(INPUT_POST, 'clientFirstname');
  $clientLastname = filter_input(INPUT_POST, 'clientLastname');
  $clientEmail = filter_input(INPUT_POST, 'clientEmail');
  $clientPassword = filter_input(INPUT_POST, 'clientPassword');

// Check for missing data
if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($clientPassword)){
  $message = '<p class="result">*Please provide information for all empty form fields.</p>';
  include '../view/registration.php';
  exit;
}

// Send the data to the model
$regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword);

// Check and report the result
if($regOutcome === 1){
  $message = "<p class='result'>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
  include '../view/login.php';
  exit;
} else {
  $message = "<p class='result'>*Sorry $clientFirstname, but the registration failed. Please try again.</p>";
  include '../view/registration.php';
  exit;
}
break;


    case 'login':
        include '../view/login.php';
        break;
    case 'registration':
        include '../view/registration.php';
        break;
    default:
        include '../view/home.php';
}