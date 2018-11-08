<?php
    if (!isset($_SESSION['loggedin'])  && $clientLevel < 2) {
            header('Location: /acme/index.php');
    }
    ?>
<!DOCTYPE html>
<html lang="en-US">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Category Page  | ACME Inc. </title>
        <meta name="description" content="Add a Category to the ACME Database">

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
            <h1>Add a Category</h1>
            <div class="req_password"> Please enter the name of the Category you wish to add.</div>

            <div class="req_password">     

                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>               
            </div>
            
            <form  method="post" action="/acme/products/index.php">
                <label>Category Name</label><input type="text" name="categoryName" id="categoryName"  placeholder="Category Name" required>

                <div>
                    <input type="submit" value="Add Category" name="action"  class="submitBtn">
                    <!--Add the action key - value pair-->
                    <input type="hidden" name="action" value="addCategory">

                </div>
            </form>

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
