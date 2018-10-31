<?php

/*
 * Accounts Controller
 */

// Get the database connection file
require_once '../library/connections.php';
//  Get the functions file
require_once '../library/functions.php';
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

    case 'registration':
        include  $_SERVER['DOCUMENT_ROOT'] .  '/acme/view/registration.php';
        break;
    
    case 'register':
// Filter and store the data
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
        $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
        
//Double Checks email and password using custom functions
        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);

// Check for missing data
        if (empty($clientFirstname) 
                || empty($clientLastname) 
                || empty($clientEmail) 
                || empty($checkPassword)) 
            
            {
            $message = '<p class="result">*Please provide information for all empty form fields.</p>';
            include '../view/registration.php';
            exit;
        }
        
        // Hash the checked password
$hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

// Send the data to the model
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

// Check and report the result
        if ($regOutcome === 1) {
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
        include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/login.php';
        break;
    
    case 'login-user':
///Filter and store the data
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);
        
        // Check for missing data
        if (empty($clientEmail) || empty($checkPassword)) {
            $message = '<p class="result">*Please provide information for all empty form fields.</p>';
            include '../view/login.php';
            exit;
        }
        break;
        
        
    default:
        include '../view/home.php';
}