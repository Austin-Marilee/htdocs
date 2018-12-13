<?php

/*
 * Accounts Controller
 */

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
//  Get the functions file
require_once '../library/functions.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
require_once '../model/reviews-model.php';


// Get the array of categories
$categories = getCategories();

if (isset($_COOKIE['firstname'])) {
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}

// Get the value from the action name - value pair
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

// Code to deliver the views will be here
switch ($action) {

    case 'registration':
        include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/registration.php';
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

        $existingEmail = checkExistingEmail($clientEmail);
        if ($existingEmail) {
            $message = '<p>This email address already exists in our records. Please login.</p>';
            include'../view/login.php';
            exit;
        }
       if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
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
            $_SESSION['message'] = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
            setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
            include '../view/login.php';
        
            exit;
        } else {
            $message = "<p class='result'>*Sorry $clientFirstname, but the registration failed. Please try again.</p>";
            include '../view/login.php';
            exit;
        }
        break;

    case 'login':
        include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/login.php';
        break;

    case 'login-user':
///Filter and store the data
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
        //Deletes the firstname cookie when a client logs in.
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientEmail = checkEmail($clientEmail);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
        $checkPassword = checkPassword($clientPassword);

        // Check for missing data
        if (empty($clientEmail) || empty($checkPassword)) {
            $_SESSION['message'] = '<p class="result">*Please provide information for all empty form fields.</p>';
            include '../view/login.php';
            exit;

            if (isset($reviewList)) {
                echo $reviewList;
            } else {
                echo '<p class="result2">We would  love to hear from you. Leave a review for your favorite product.</p>';
            }
        }

        // A valid password exists, proceed with the login process
// Query the client data based on the email address
        $clientData = getClient($clientEmail);

// Compare the password just submitted against
// the hashed password for the matching client
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);

// If the hashes don't match create an error
// and return to the login view
        if (!$hashCheck) {
            $_SESSION['message'] = '<p class="result">Please check your information and try again.</p>';
            include '../view/login.php';
            exit;
        }

// A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;

// Remove the password from the array
// the array_pop function removes the last
// element from an array
        array_pop($clientData);

// Store the array into the session
        $_SESSION['clientData'] = $clientData;
        $clientFirstname = $_SESSION['clientData']['clientFirstname'];
        $clientLastname = $_SESSION['clientData']['clientLastname'];
        $clientEmail = $_SESSION['clientData']['clientEmail'];
        $clientLevel = $_SESSION['clientData']['clientLevel'];
        $clientId = $_SESSION['clientData']['clientId'];

        $_SESSION['message'] = '<p class="result2">You have successfully logged in.</p>';
        setcookie('firstname', $clientFirstname, strtotime('-1 year'), '/');
// Send them to the admin view
        header('Location: /acme/accounts/');

        break;

    case 'logout':
// remove all session variables
        session_unset();
// destroy the session 
        session_destroy();
        setcookie('firstname', $clientFirstname, strtotime('-1 year'), '/');
        header('Location: /acme/index.php');
        exit;
        break;

    case 'acnt':
        $clientId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
//        $clientId = $_SESSION['clientData']['clientId'];
        $clientInfo = getClientInfo($clientId);
        if (count($clientInfo) < 1) {
            $message = '<p class="result2">Sorry, no client information could be found.</p>';
        }
        include '../view/client-update.php';
        exit;
        break;

    case 'updateClient':
        // Filter and store the data
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
        $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_STRING);
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
        $clientEmail = checkEmail($clientEmail);

//Check for email change
        if ($clientEmail != $_SESSION['clientData']['clientEmail']) {
            $existingEmail = checkExistingEmail($clientEmail);
            if ($existingEmail) {
                $_SESSION['message'] = '<p class="result2 notice">This email address already exists in our records. Please try again.</p>';
                include '../view/client-update.php';
                exit;
            }
        }

        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)) {
            $_SESSION['message'] = '<p class="result2">*Please provide information for all empty form fields.</p>';
            include '../view/client-update.php';
            exit;
        }
// Send the data to the model
        $updateResult = updateClient($clientId, $clientFirstname, $clientLastname, $clientEmail);
        $clientData = getClientInfo($clientId);
        $_SESSION['clientData'] = $clientData;
        // Check and report the result
        if ($updateResult) {
            $_SESSION['message'] = "<p class='result2'>Your account was sucessfully updated. </p>";
            header('Location: /acme/accounts/');
            exit;
        } else {
            $_SESSION['message'] = "<p class='result2'>Sorry, the account was not updated. Please try again.</>";
            include '../view/client-update.php';
        }


        exit;
        break;

    case 'updatePass':
        // Filter and store the data
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
        $checkPassword = checkPassword($clientPassword);
        // Check for missing data
        if (empty($checkPassword)) {
            $message = '<p class="result2">*Please match the requested format.</p>';
            include '../view/client-update.php';
            exit;
        }
        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
// Send the data to the model
        $updateResult = updatePass($hashedPassword, $clientId);
// Check and report the result
        if ($updateResult) {
            $message = "<p class='result2'>Congratulations, your password  was successfully updated.</p>";
            $_SESSION['message'] = $message;
            include '../view/admin.php';
            exit;
        } else {
            $message = "<p class='result2'>Sorry, but updating your password  was unsucessful.</p>";
            include '../view/client-update.php';
            exit;
        }
        break;

    case'admin':
        if (isset($_SESSION['loggedin'])) {
            header('Location: /acme/accounts/');
        } else {
            header('Location: /acme/index.php');
        }
        break;

    default:
        $clientId = $_SESSION['clientData']['clientId'];
        $reviewArray = getReviewInfo($clientId);
         if (count($reviewArray) > 0) {
        $reviewList = '<table>';
        $reviewList .= '<thead>';
        $reviewList .= '<tr><th>Date</th><th>Reviews</th><td>&nbsp;</td></tr>';
        $reviewList .= '</thead><tbody>';
        foreach ($reviewArray as $review) {
            $madeDate = $review['reviewDate'];
            $stringDate = strtotime($madeDate);
            $displayDate = date('m.d.y', ($stringDate));
            $reviewList .= "<tr><td>$displayDate</td>";
            $reviewList .= "<td>$review[reviewText]</td>";
            $reviewList .= "<td><a href='/acme/reviews?action=editReview&id=$review[reviewId]' title='Click to modify'>Edit</a></td>";
            $reviewList .= "<td><a href='/acme/reviews?action=deleteView&id=$review[reviewId]' title='Click to delete'>Delete</a></td></tr>";
        }
        $reviewList .= '</tbody></table>';

         }else {
             $message = "<hr><br><p class='result'>Please enter  a review on our product pages. We would love to hear from you.</p>";
         }
        include '../view/admin.php';
}

