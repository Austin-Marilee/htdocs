<?php

/*
 * PRODUCTS CONTROLLER
 */

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the acme model for use as needed
require_once '../library/functions.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';
// Get the accounts model
require_once '../model/products-model.php';

// Get the array of categories
$categories = getCategories();

// Get the value from the action name - value pair
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {

    case 'addProduct':
// Filter and store the data

        $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
        $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
        $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
        $invSize = filter_input(INPUT_POST, 'invSize', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invWeight = filter_input(INPUT_POST, 'invWeight', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invLocation = filter_input(INPUT_POST, 'invLocation', FILTER_SANITIZE_STRING);
        $categoryId = filter_input(INPUT_POST, 'categoryId', FILTER_SANITIZE_NUMBER_INT);
        $invVendor = filter_input(INPUT_POST, 'invVendor', FILTER_SANITIZE_STRING);
        $invStyle = filter_input(INPUT_POST, 'invStyle', FILTER_SANITIZE_STRING);

        $validPrice = checkPrice($invPrice);

        // Check for missing data
        if (empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($validPrice) || empty($invStock) || empty($invSize) || empty($invWeight) || empty($invLocation) || empty($categoryId) || empty($invVendor) || empty($invStyle)) {
            $message = '<p class="result">*Please provide information for all empty form fields.</p>';
            include '../view/product.php';
            exit;
        }

// Send the data to the model
        $regOutcome = addProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle);

// Check and report the result
        if ($regOutcome === 1) {
            $message = "<p class='result'>You successfully added $invName to the database.</p>";
            include '../view/product.php';
            exit;
        } else {
            $message = "<p class='result'>Sorry, but adding the product was unsucessful.</p>";
            include '../view/product.php';
            exit;
        }
        break;

    case 'addCategory':
// Filter and store the data
        $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_STRING);

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
            header("Location: /acme/products/index.php");
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

    case 'mod':
        $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $prodInfo = getProductInfo($invId);
        if (count($prodInfo) < 1) {
            $message = 'Sorry, no product information could be found.';
        }
        include '../view/prod-update.php';
        exit;
        break;

    case 'updateProd':
        // Filter and store the data

        $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
        $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
        $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
        $invSize = filter_input(INPUT_POST, 'invSize', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invWeight = filter_input(INPUT_POST, 'invWeight', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invLocation = filter_input(INPUT_POST, 'invLocation', FILTER_SANITIZE_STRING);
        $categoryId = filter_input(INPUT_POST, 'categoryId', FILTER_SANITIZE_NUMBER_INT);
        $invVendor = filter_input(INPUT_POST, 'invVendor', FILTER_SANITIZE_STRING);
        $invStyle = filter_input(INPUT_POST, 'invStyle', FILTER_SANITIZE_STRING);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
        $validPrice = checkPrice($invPrice);

        // Check for missing data
        if (empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($validPrice) || empty($invStock) || empty($invSize) || empty($invWeight) || empty($invLocation) || empty($categoryId) || empty($invVendor) || empty($invStyle)) {
            $message = '<p class="result">*Please provide information for all empty form fields.</p>';
            include '../view/prod-update.php';
            exit;
        }

// Send the data to the model
        $updateResult = updateProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle, $invId);

// Check and report the result
        if ($updateResult) {
            $message = "<p class='result'>Congratulations, $invName was successfully updated.</p>";
            $_SESSION['message'] = $message;
            header('location: /acme/products/');
            exit;
        } else {
            $message = "<p class='result'>Sorry, but updating the product was unsucessful.</p>";
            include '../view/prod-update.php';
            exit;
        }
        break;

    case 'del':
        $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $prodInfo = getProductInfo($invId);
        if (count($prodInfo) < 1) {
            $message = 'Sorry, no product information could be found.';
        }
        include '../view/prod-delete.php';
        exit;
        break;

    case 'deleteProd':
        // Filter and store the data
        $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
// Send the data to the model
        $deleteResult = deleteProduct($invId);
// Check and report the result
        if ($deleteResult) {
            $message = "<p class='result'> $invName was successfully deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /acme/products/');
            exit;
        } else {
            $message = "<p class='result'> Error: $invName was not deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /acme/products/');
            exit;
        }
        break;

    case 'category':
        $categoryName = filter_input(INPUT_GET, 'categoryName', FILTER_SANITIZE_STRING);
        $products = getProductsByCategory($categoryName);
        if (!count($products)) {
            $message = "<p class='notice'>Sorry, no $categoryName products could be found.</p>";
        } else {
            $prodDisplay = buildProductsDisplay($products);
        }
        include '../view/display.php';
        break;

    case 'product':
        $invName = filter_input(INPUT_GET, 'invName', FILTER_SANITIZE_STRING);
        $products = getProductDisplay($invName);
        if (!count($products)) {
            $message = "<p class='notice'>Sorry, no $invName could be found.</p>";
        } else {
            $prodDisplay = buildProductsDetails($products);
        }
        include '../view/product-detail.php';
        break;
        
    default:
        $products = getProductBasics();
        if (count($products) > 0) {
            $prodList = '<table>';
            $prodList .= '<thead>';
            $prodList .= '<tr><th>Product Name</th><td>&nbsp;</td><td>&nbsp;</td></tr>';
            $prodList .= '</thead>';
            $prodList .= '<tbody>';
            foreach ($products as $product) {
                $prodList .= "<tr><td>$product[invName]</td>";
                $prodList .= "<td><a href='/acme/products?action=mod&id=$product[invId]' title='Click to modify'>Modify</a></td>";
                $prodList .= "<td><a href='/acme/products?action=del&id=$product[invId]' title='Click to delete'>Delete</a></td></tr>";
            }
            $prodList .= '</tbody></table>';
        } else {
            $message = '<p class="result">Sorry, no products were returned.</p>';
        }
        include '../view/management.php';
}