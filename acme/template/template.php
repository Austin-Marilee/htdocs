<!DOCTYPE html>
<html lang="en-US">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Template | ACME Inc. </title>
        <meta name="description" content="Template page for CIT336 Enhancement#1">

        <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet">
        <link href="styles/normalize.css" rel="stylesheet" type="text/css" media="screen"> <!-- normalize useragent/browser defaults -->
        <link href="styles/main.css" rel="stylesheet"  type="text/css" media="screen">    <!-- default styles - small/phone views -->
        <link href="styles/medium.css" rel="stylesheet"  type="text/css" media="screen">  <!-- medium/tablet views -->
        <link href="styles/large.css" rel="stylesheet"  type="text/css" media="screen">   <!-- large/wide/desktop views -->
    </head>

    <body>

        <!--header-->
        <header class="top-layer">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?> 
        </header>

            <nav>
                <?php echo $navList; ?>
            </nav>

            <!--main styles-->
            <main class="top-layer">  
                <h1>Content Title</h1>
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