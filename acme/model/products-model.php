<?php

/*
 * PRODUCTS MODEL
 */

// Insert New Category into database
function addCategory($categoryName) {

    // Create a connection object using the Acme Connection funtion
    $db = acmeConnect();
    // The SQL statement to be used with the database
    $sql = 'INSERT INTO categories (categoryName) VALUES(:categoryName)';
    // The next line creates the prepared statement using the acme connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL statement with the actual values in the variables and tells the database the type of data it is
    $stmt->bindValue(':categoryName', $categoryName, PDO::PARAM_STR);
    // Use the prepared statement to insert the data
    $stmt->execute();
    // Now we find out if the insert worked by asking how many rows changed in the table
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}

// Insert New Product into database
function addProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle) {
    $db = acmeConnect();
    $sql = 'INSERT INTO inventory ( invName, invDescription, invImage, invThumbnail, invPrice, invStock, invSize, invWeight, invLocation,  categoryId, invVendor, invStyle) VALUES (:invName, :invDescription, :invImage, :invThumbnail, :invPrice, :invStock, :invSize, :invWeight, :invLocation, :categoryId, :invVendor, :invStyle) ';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invName', $invName, PDO::PARAM_STR);
    $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
    $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
    $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
    $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
    $stmt->bindValue(':invStock', $invStock, PDO::PARAM_INT);
    $stmt->bindValue(':invSize', $invSize, PDO::PARAM_INT);
    $stmt->bindValue(':invWeight', $invWeight, PDO::PARAM_INT);
    $stmt->bindValue(':invLocation', $invLocation, PDO::PARAM_STR);
    $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_STR);
    $stmt->bindValue(':invVendor', $invVendor, PDO::PARAM_STR);
    $stmt->bindValue(':invStyle', $invStyle, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

//Get Basic product information from inventory for update and delete processes
function getProductBasics() {
    $db = acmeConnect();
    $sql = 'SELECT invName, invId FROM inventory ORDER BY invName ASC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $products;
}

// Get product information by invId
//Get data for a featured inventory item
function getProductInfo($invId) {
    $db = acmeConnect();
    $sql = 'SELECT * FROM inventory WHERE invId = :invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $prodInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $prodInfo;
}

// Update Products in the database
function updateProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle, $invId) {
    $db = acmeConnect();
    $sql = 'UPDATE inventory SET invName = :invName, invDescription = :invDescription, invImage = :invImage, invThumbnail = :invThumbnail, invPrice = :invPrice, invStock = :invStock, invSize = :invSize, invWeight = :invWeight, invLocation = :invLocation, categoryId = :categoryId, invVendor = :invVendor, invStyle = :invStyle WHERE invId = :invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invName', $invName, PDO::PARAM_STR);
    $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
    $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
    $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
    $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
    $stmt->bindValue(':invStock', $invStock, PDO::PARAM_INT);
    $stmt->bindValue(':invSize', $invSize, PDO::PARAM_INT);
    $stmt->bindValue(':invWeight', $invWeight, PDO::PARAM_INT);
    $stmt->bindValue(':invLocation', $invLocation, PDO::PARAM_STR);
    $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_STR);
    $stmt->bindValue(':invVendor', $invVendor, PDO::PARAM_STR);
    $stmt->bindValue(':invStyle', $invStyle, PDO::PARAM_STR);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

//Delete products from the database
function deleteProduct($invId) {
    $db = acmeConnect();
    $sql = 'DELETE FROM inventory WHERE invId = :invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

//Get a list of products based on the category (uses a SQL subquery)
function getProductsByCategory($categoryName) {
    $db = acmeConnect();
    $sql = 'SELECT * FROM inventory WHERE categoryId IN (SELECT categoryId FROM categories WHERE categoryName = :categoryName)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':categoryName', $categoryName, PDO::PARAM_STR);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $products;
}

//// Gets featured  information 
//function getFeatured($invId) {
//    $db = acmeConnect();
//    $sql = "SELECT invId, invName, invDescription, invFeatured invImage FROM inventory WHERE invFeatured  = TRUE  AND invId =:invId";
//    $stmt = $db->prepare($sql);
//    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
//    $stmt->execute();
//    $featured = $stmt->fetchAll(PDO::FETCH_ASSOC);
//    $stmt->closeCursor();
//    return $featured;
//}
//
////Set featured Item to NULL
//function clearFeatured($invId, $invFeatured) {
//    $db = acmeConnect();
//    $sql = 'UPDATE inventory SET invFeatured = :invFeatured  WHERE invId = :invId';
//    $stmt = $db->prepare($sql);
//    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
//    $stmt->bindValue(':invFeatured', $invFeatured, PDO::PARAM_NULL);
//    $stmt->execute();
//    $rowsChanged = $stmt->rowCount();
//    $stmt->closeCursor();
//    return $rowsChanged;
//}
//
////Set an inventory item featured settings to TRUE (1)
//function setFeatured($invId, $invFeatured) {
//    $db = acmeConnect();
//    $sql = 'UPDATE inventory SET invFeatured = TRUE  WHERE invId = :invId';
//    $stmt = $db->prepare($sql);
//    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
//    $stmt->bindValue(':TRUE', $invFeatured, PDO::PARAM_BOOL);
//    $stmt->execute();
//    $rowsChanged = $stmt->rowCount();
//    $stmt->closeCursor();
//    return $rowsChanged;
//}


