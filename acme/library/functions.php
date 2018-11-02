<?php

/*
 * CUSTOM FUNCTIONS
 */

//Checks for valid email address
function checkEmail($clientEmail){
$valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
return $valEmail;
}

// Check the password for a minimum of 8 characters,
 // at least one 1 capital letter, at least 1 number and
 // at least 1 special character
function checkPassword($clientPassword){
 $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])[[:print:]]{8,}$/';
 return preg_match($pattern, $clientPassword);
}

// Build a navigation bar
function buildNav($categories) {
    // Build a navigation bar using the $categories array
$navList = '<button onclick="toggleNavMenu()">&#9776;</button> <ul class="hide mainmenu" id="primaryNav">';
$navList .= "<li><a href='/acme/index.php' title='View the Acme home page'>Home</a></li>";

foreach ($categories as $category) {
    $navList .= "<li><a href='/acme/index.php?action=" . urlencode($category['categoryName']) . "' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
}
$navList .= '</ul>';
return $navList;
}