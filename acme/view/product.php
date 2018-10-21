<!DOCTYPE html>
<html lang="en-US">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Product Page | ACME Inc. </title>
        <meta name="description" content="Add Products to the ACME Database">

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
            <?php echo $navList; ?>
        </nav>

        <!--main styles-->
        <main class="top-layer">  
            <h1>Add a Product</h1>
            <div class="req_password"> Please complete the form to add a product. </div>

            <div class="req_password">            
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
            </div>


            <form  method="post" action="/acme/products/index.php">

                <fieldset>
                    <legend>Product Name & Description</legend>
                    <label>Please choose a product category:</label>
                    <div class="dropdown"> <?php echo $catList; ?></div>
                    <label><input type="text" name="invName" id="invName" placeholder="Product Name"></label>
                    <label><input type="text" name="invDescription" id="invDescription" placeholder="Description" size="40px"></label>
                </fieldset>

                <fieldset>
                    <legend>Product Images</legend>
<!--                    <label>Product image <input type="file" name="invImage" id="invImage" class="clearLabel"></label>
                    <label>Image Thumbnail<input type="file" name="invThumbnail" id="invThumbnail" class="clearLabel"></label>-->
                    <label>Product image <input type="text" name="invImage" id="invImage" class="clearLabel"></label>
                    <label>Image Thumbnail<input type="text" name="invThumbnail" id="invThumbnail" class="clearLabel"></label>
                </fieldset>

                <fieldset>
                    <legend>Product Details</legend>
                    <label><input type="number" min="0" step="0.01"  name="invPrice" id="invPrice" placeholder="Price"></label>
                    <label><input type="text" name="invSize" id="invSize" placeholder="Size"></label>
                    <label><input type="text" name="invWeight" id="invWeight" placeholder="Weight"></label>
                    <label><input type="text" name="invStyle" id="invStyle" placeholder="Style"></label>
                </fieldset>

                <fieldset>
                    <legend>Product Availability</legend>
                    <label><input type="number" name="invStock" id="invStock" placeholder="Available Stock"></label>
                    <label><input type="text" name="invLocation" id="invLocation" placeholder="Location"></label>
                    <label><input type="text" name="invVendor" id="invVendor" placeholder="Vendor"></label>
                </fieldset>
                <div><input type="submit" value="Add Product" class="submitBtn">
                    <!--Add the action key - value pair-->
                    <input type="hidden" name="action" value="addProduct">
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
