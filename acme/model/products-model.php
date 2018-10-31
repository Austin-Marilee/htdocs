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

    // Create a connection object using the Acme Connection funtion
    $db = acmeConnect();

    // The SQL statement to be used with the database
    $sql = 'INSERT INTO inventory ( invName, invDescription, invImage, invThumbnail, invPrice, invStock, invSize, invWeight, invLocation,  categoryId, invVendor, invStyle) VALUES (:invName, :invDescription, :invImage, :invThumbnail, :invPrice, :invStock, :invSize, :invWeight, :invLocation, :categoryId, :invVendor, :invStyle) ';
    // The next line creates the prepared statement using the acme connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL statement with the actual values in the variables and tells the database the type of data it is
    $stmt->bindValue(':invName', $invName, PDO::PARAM_STR);
    $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
    $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
    $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
    $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_FLOAT);
    $stmt->bindValue(':invStock', $invStock, PDO::PARAM_INT);
    $stmt->bindValue(':invSize', $invSize, PDO::PARAM_INT);
    $stmt->bindValue(':invWeight', $invWeight, PDO::PARAM_INT);
    $stmt->bindValue(':invLocation', $invLocation, PDO::PARAM_STR);
    $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_INT);
    $stmt->bindValue(':invVendor', $invVendor, PDO::PARAM_STR);
    $stmt->bindValue(':invStyle', $invStyle, PDO::PARAM_STR);
    // Use the prepared statement to insert the data
    $stmt->execute();
    // Now we find out if the insert worked by asking how many rows changed in the table
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}
