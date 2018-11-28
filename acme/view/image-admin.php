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
        <title>Image Management | ACME Inc. </title>
        <meta name="description" content="Image Management for ACME Inc.">

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
            <h1>Image Management</h1>
            <p class="reg-message">Welcome to Image Management. <br>Please choose one of the options below.</p>
            <h2 class="add-image">Add New Product Image</h2>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>

            <form action="/acme/uploads/" method="post" enctype="multipart/form-data">
                <label for="invItem">Product</label><br>
                <?php echo $prodSelect; ?><br>
                 <input type="file" name="file1" class="inputfile" id="file">
                <label for="file"><span>  Choose a file</span></label><br>
                <input type="submit"value="Upload" class="submitBtn">
                <input type="hidden" name="action" value="upload">
            </form>

            <hr>

            <h2 class="add-image">Existing Images</h2>
            <p class="reg-message">If deleting an image, delete the thumbnail too and vice versa.</p>
            <?php
            if (isset($imageDisplay)) {
                echo $imageDisplay;
            }
            ?>
        </main>

        <!--footer-->
        <footer class="top-layer">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
        </footer>

        <!--scripts-->
        <script src="../scripts/fileupload.js"></script>
        <script src="../scripts/hamburger.js"></script>
        <script src="../scripts/mainmenu.js"></script>

    </body>
</html>
<?php unset($_SESSION['message']); ?>
