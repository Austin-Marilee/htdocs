<!DOCTYPE html>
<html lang="en-US">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $products['invName']; ?> Products | Acme, Inc.</title>
        <meta name="description" content="Template page for CIT336 Enhancement#1">

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
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <?php
            if (isset($prodDetailDisplay)) {
                echo $prodDetailDisplay;
            }
            ?>

            <hr>
            <section>
                <h2 class="add-image">Product Thumbnails</h2>
                <?php
                if (isset($displayThumbnail)) {
                    echo $displayThumbnail;
                }
                ?>
            </section>
            <br>
            <hr>
            <section>
                <h3>Customer Reviews</h3>
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                }
                ?>

                <?php
                if (isset($_SESSION['loggedin'])) {
                    echo $reviewDisplay;
                } else {
                    echo '<p class="result2">Please login to add a review.</p> <a href="/acme/accounts/index.php?action=login"  ><div class="adminBtn">Login</div></a><br><hr>';
                }
                ?>

                <?php
                if (isset($allReviews)) {
                    echo $allReviews;
                }
                ?>
            </section>
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