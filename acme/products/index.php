<?php

/*
 * PRODUCTS CONTROLLER
 */

// Get the database connection file
require_once '../library/connections.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';
// Get the accounts model
require_once '../model/products-model.php';

// Get the array of categories
$categories = getCategories();

// Build a navigation bar using the $categories array
$navList = '<button onclick="toggleNavMenu()">&#9776;</button> <ul class="hide mainmenu" id="primaryNav">';
$navList .= "<li><a href='/acme/index.php' title='View the Acme home page'>Home</a></li>";

foreach ($categories as $category) {
    $navList .= "<li><a href='/acme/index.php?action=" . urlencode($category['categoryName']) . "' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
}
$navList .= '</ul>';

// Drop down menu for the products page
$catList = '<select name="categoryId"> ';
$catList .= '<option value="select" disabled selected>Choose a Category</option>';

foreach ($categories as $category) {
    $catList .= "<option value=" . $category['categoryId'] . ">$category[categoryName]</option>";
}
$catList .= '</select>';


// Get the value from the action name - value pair
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {

    case 'addProduct':
// Filter and store the data
        
        $invName = filter_input(INPUT_POST, 'invName');
        $invDescription = filter_input(INPUT_POST, 'invDescription');
        $invImage = filter_input(INPUT_POST, 'invImage');
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail');
        $invPrice = filter_input(INPUT_POST, 'invPrice');
        $invStock = filter_input(INPUT_POST, 'invStock');
        $invSize = filter_input(INPUT_POST, 'invSize');
        $invWeight = filter_input(INPUT_POST, 'invWeight');
        $invLocation = filter_input(INPUT_POST, 'invLocation');
        $categoryId = filter_input(INPUT_POST, 'categoryId');
        $invVendor = filter_input(INPUT_POST, 'invVendor');
        $invStyle = filter_input(INPUT_POST, 'invStyle');


// Check for missing data
        if (empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invSize) || empty($invWeight) || empty($invLocation) || empty($categoryId) || empty($invVendor) || empty($invStyle)) {
            $message = '<p class="result">*Please provide information for all empty form fields.</p>';
            include '../view/product.php';
            exit;
        }

// Send the data to the model
        $regOutcome = addProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle);

// Check and report the result
        if ($regOutcome === 1) {
            $message = "<p class='result'>You successfully added $invName to the database.</p>";
            include '../view/management.php';
            exit;
        } else {
            $message = "<p class='result'>Sorry, but adding the product was unsucessful.</p>";
            include '../view/product.php';
            exit;
        }
        break;

    case 'addCategory':
// Filter and store the data
        $categoryName = filter_input(INPUT_POST, 'categoryName');

// Check for missing data
        if (empty($categoryName)) {
            $message = '<p class="result">*You must enter a category name.</p>';
            include '../view/category.php';
            exit;
        }

// Send the data to the model
        $regOutcome = addCategory($categoryName);

// Check and report the result
        if ($regOutcome === 1) {
            $message = "<p class='result'>You successfully added the $categoryName  category to the database.</p>";
            include '../view/management.php';
            exit;
        } else {
            $message = "<p class='result'>*Sorry, but adding the category was unsuccessful.</p>";
            include '../view/category.php';
            exit;
        }
        break;


    case 'productView':
        include '../view/product.php';
        break;
    case 'categoryView':
        include '../view/category.php';
        break;
    default:
        include '../view/management.php';
}