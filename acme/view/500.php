<!DOCTYPE html>
<html lang="en-US">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Error | ACME Inc.</title>
<!--        <title>CIT336 Enhancement#1 | Template |  Marilee Austin | BYU-Idaho</title>-->
        <meta name="description" content="Error Page for Acme Inc.">

        <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet">
        <link href="styles/normalize.css" rel="stylesheet" type="text/css" media="screen"> <!-- normalize useragent/browser defaults -->
        <link href="../styles/main.css" rel="stylesheet"  type="text/css" media="screen">    <!-- default styles - small/phone views -->
        <link href="../styles/medium.css" rel="stylesheet"  type="text/css" media="screen">  <!-- medium/tablet views -->
        <link href="../styles/large.css" rel="stylesheet"  type="text/css" media="screen">   <!-- large/wide/desktop views -->
    </head>

    <body>

        <!--header-->
        <header class="top-layer">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '../acme/common/header.php'; ?> 
        </header>

        <nav>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/navigation.php'; ?> 
        </nav>

        <!--main styles-->
        <main class="top-layer">  
            <h1>Server Error</h1>
            <h3>Sorry, the server experienced a problem</h3>
        </main>

        <!--footer-->
        <footer class="top-layer">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '../acme/common/footer.php'; ?>
        </footer>

        <!--scripts-->
        <script src="scripts/hamburger.js"></script>
        <script src="scripts/mainmenu.js"></script>

    </body>
</html>