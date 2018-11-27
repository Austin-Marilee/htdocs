<?php

/*
 * CUSTOM FUNCTIONS
 */

//Checks for valid email address
function checkEmail($clientEmail) {
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
}

// Check the password for a minimum of 8 characters,
// at least one 1 capital letter, at least 1 number and
// at least 1 special character
function checkPassword($clientPassword) {
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])[[:print:]]{8,}$/';
    return preg_match($pattern, $clientPassword);
}

//Checks Price Pattern
function checkPrice($invPrice) {
    $pattern = '/^([1-9][0-9]*|0)(\.[0-9]{2})?$/';
    return preg_match($pattern, $invPrice);
}

// Build a navigation bar
function buildNav($categories) {
    // Build a navigation bar using the $categories array
    $navList = '<button onclick="toggleNavMenu()">&#9776;</button> <ul class="hide mainmenu" id="primaryNav">';
    $navList .= "<li><a href='/acme/' title='View the Acme home page'>Home</a></li>";

//Builds the Drop Down List
    foreach ($categories as $category) {
        $navList .= "<li>    <a href='/acme/products/?action=category&categoryName="
                . urlencode($category['categoryName']) .
                "' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
    }
    $navList .= '</ul>';
    return $navList;
}

//Displays a list of products within an unordered list
function buildProductsDisplay($products) {
    $pd = '<ul id="prod-display">';
    foreach ($products as $product) {
        $pd .= '<li>';
        $pd .= "<a href='/acme/products/?action=product&invName=" . urlencode($product['invName']) . " ' title = 'View $product[invName]'> <img src='$product[invThumbnail]' alt='Image of $product[invName] on Acme.com'></a>";
        $pd .= "<a href='/acme/products/?action=product&invName=" . urlencode($product['invName']) . " ' title = 'View $product[invName]'> <h2>$product[invName]</h2></a>";
        $pd .= "<span>$$product[invPrice]</span>";
        $pd .= '</li>';
    }
    $pd .= '</ul>';
    return $pd;
}

//Displays the product details individually
function buildProductsDetails($products) {
    $pd = '<section id="prod-details">';
    foreach ($products as $product) {
        $pd .= '<div>';
        $pd .= "<img src='$product[invImage]' alt='Image of $product[invName] on Acme.com'>";
        $pd .= "<ul>";
        $pd .= "<li>Available Stock: $product[invStock]</li>";
        $pd .= "<li>Weight: $product[invWeight]</li>";
        $pd .= "<li>Location: $product[invLocation]</li>";
        $pd .= "<li>Vendor: $product[invVendor]</li>";
        $pd .= "<li>Style: $product[invStyle]</li>";
        $pd .= "</ul>";
        $pd .= "<p>$product[invDescription]</p>";
        $pd .= "<span>$$product[invPrice]</span>";
        $pd .= '</div>';
    }
    $pd .= '</section>';
    return $pd;
}
