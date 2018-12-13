<?php
if (!$_SESSION['loggedin']) {
    header('Location: /acme/');
}
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
}
?>
<!DOCTYPE html>
<html lang="en-US">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin | ACME Inc. </title>
        <meta name="description" content="Administration Page for ACME Inc.">

        <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet">
        <link href="../styles/normalize.css" rel="stylesheet" type="text/css" media="screen"> <!-- normalize useragent/browser defaults -->
        <link href="../styles/main.css" rel="stylesheet"  type="text/css" media="screen">    <!-- default styles - small/phone views -->
        <link href="../styles/medium.css" rel="stylesheet"  type="text/css" media="screen">  <!-- medium/tablet views -->
        <link href="../styles/large.css" rel="stylesheet"  type="text/css" media="screen">   <!-- large/wide/desktop views -->
    </head>

    <body>

        <!--header-->
        <header class="top-layer">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?> 
        </header>

        <nav>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/navigation.php'; ?> 
        </nav>

        <!--main styles-->
        <main class="top-layer">  
            <h1>
                <?php
                echo $_SESSION['clientData']['clientFirstname'] . " " . $_SESSION['clientData']['clientLastname'];
                ?>
            </h1>
            <div>   
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                }
                ?>
            </div>
            <ul class="admin-user">
                <li>First name: <?php echo $_SESSION['clientData']['clientFirstname']; ?></li>
                <li>Last name: <?php echo $_SESSION['clientData']['clientLastname']; ?></li>
                <li>Email: <?php echo $_SESSION['clientData']['clientEmail']; ?></li>


            </ul>
            <a href="/acme/accounts/index.php?action=acnt&id=<?php echo $_SESSION['clientData']['clientId']; ?>"><div class="adminBtn">Update Account</div></a>

            <!--Displays the list of reviews-->
            <?php
            if ($_SESSION['clientData']['clientLevel'] > 1) {
                echo '<br><br> <hr><div class="admin">
                <h3>Administration</h3>
                <p>Click here to manage products.</p><a href="/acme/products/index.php"><p class="addBtn">Product Management</p></a><br>
                <a href="/acme/uploads/"><p class="addBtn">Image Management</p></a></div>';
            }
            ?>

            <?php
            if (isset($reviewList)) {
                echo ' <br><br> <hr><h3>Manage Reviews</h3>';
                                                if (isset($_SESSION['message2'])) {
                    echo $_SESSION['message2'];
                }
 echo $reviewList;
            } else {
                echo '<br><hr><p class="result2">Please  leave a product review. We would love to hear from you.</p>';
            }
            ?>
        </main>

        <!--footer-->
        <footer class="top-layer">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
        </footer>

        <!--scripts-->
        <script src="../scripts/hamburger.js"></script>
        <script src="../scripts/mainmenu.js"></script>

    </body>
</html>

<?php unset($_SESSION['message']); ?>
<?php unset($_SESSION['message2']); ?>