<?php
if (!$_SESSION['loggedin']) {
    header('Location: /acme/');
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
                echo $clientFirstname . " " . $clientLastname;
                ?>
            </h1>
            <ul class="admin-user">
                <li>First name: <?php echo $clientFirstname; ?></li>
                <li>Last name: <?php echo $clientLastname; ?></li>
                <li>Email: <?php echo $clientEmail; ?></li>
                <li>User Level: <?php echo $clientLevel; ?></li>
            </ul>
            <?php
            if ($clientLevel > 1) {
                echo '<a href="/acme/products/index.php"><p class="adminBtn">Product Management</p></a>';
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
