<?php
 $catList = '<select required name="categoryId" id="categoryId" class="drop-down" > ';
$catList .= '<option  disabled selected>Category Name</option>';

foreach ($categories as $category) {
    $catList .= "<option value=' $category[categoryId] '";
        if(isset($categoryId)) {            
            if($category['categoryId'] ===$categoryId) {
                $catList .='   selected   ';
            }
        }    
    $catList .= ">$category[categoryName]</option>";
}
$catList .= '</select>';
?>
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
                    <div class="dropdown"><label>Choose a Category</label> <?php echo $catList; ?></div>
                    <label>Product Name</label><input type="text" name="invName" id="invName"   <?php if(isset($invName)){echo "value='$invName'";}  ?>   required>
                    <label>Description</label><textarea  name="invDescription" id="invDescription" required><?php if(isset($invDescription)){echo $invDescription;}  ?></textarea>
                </fieldset>

                <fieldset>
                    <legend>Product Images</legend>
                    <label>Product image</label> <input type="text" name="invImage" value="/acme/images/no-image.png" id="invImage"  <?php if(isset($invImage)){echo "value='$invImage'";}  ?>   required>
                    <label>Image Thumbnail</label> <input type="text" name="invThumbnail" value="/acme/images/no-image.png" id="invThumbnail"  <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";}  ?>   required>
                </fieldset>

                <fieldset>
                    <legend>Product Details</legend>
                    <label>Price</label><input type="number" step="0.01" name="invPrice" id="invPrice"  <?php if(isset($invPrice)){echo "value='$invPrice'";}  ?>   required>
                    <label>Size</label><input type="text" name="invSize" id="invSize"  <?php if(isset($invSize)){echo "value='$invSize'";}  ?>   required>
                    <label>Weight</label><input type="text" name="invWeight" id="invWeight" <?php if(isset($invWeight)){echo "value='$invWeight'";}  ?>   required >
                    <label>Style</label><input type="text" name="invStyle" id="invStyle" <?php if(isset($invStyle)){echo "value='$invStyle'";}  ?>   required>
                </fieldset>

                <fieldset>
                    <legend>Product Availability</legend>
                    <label>Available Stock</label><input type="number" name="invStock" id="invStock" <?php if(isset($invStock)){echo "value='$invStock'";}  ?>   required>
                    <label>Location</label><input type="text" name="invLocation" id="invLocation" <?php if(isset($invLocation)){echo "value='$invLocation'";}  ?>   required >
                    <label>Vendor</label><input type="text" name="invVendor" id="invVendor" <?php if(isset($invVendor)){echo "value='$invVendor'";}  ?>   required>
                </fieldset>
                
                <fieldset>
                <input type="submit" value="Add Product" class="submitBtn">
                    <!--Add the action key - value pair-->
                    <input type="hidden" name="action" value="addProduct">
                </fieldset>
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
