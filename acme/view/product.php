<?php
$catList = '<select required name="categoryId" id="categoryId" class="drop-down"> ';
$catList .= '<option value="" disabled selected>Choose a Category</option>';

foreach ($categories as $category) {
    $catList .= "<option value=' $category[categoryId] '";
        if(isset($categoryId)) {            
            if($category['categoryId']  === $categoryId) {
                 $catList .=  '  selected  ' ;
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
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/navigation.php'; ?> 
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
                   <label>Choose a Category</label> <?php echo $catList; ?>
                   <label>Product Name</label><input type="text" name="invName" id="invName"   placeholder="Product Name" <?php if(isset($invName)){echo "value='$invName'";}  ?>   required>
                    <label>Description</label><textarea  name="invDescription" id="invDescription" placeholder="Description" required><?php if(isset($invDescription)){echo $invDescription;}  ?></textarea>
                </fieldset>

                <fieldset>
                    <legend>Product Images</legend>
                    <label>Product image</label> <input type="text" name="invImage" value="/acme/images/no-image.png" id="invImage" placeholder="Product Image" <?php if(isset($invImage)){echo "value='$invImage'";}  ?>   required>
                    <label>Image Thumbnail</label> <input type="text" name="invThumbnail" value="/acme/images/no-image.png" id="invThumbnail" placeholder="Image Thumbnail" <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";}  ?>   required>
                </fieldset>

                <fieldset>
                    <legend>Product Details</legend>
                    <label>Price</label><input type="number" step="0.5" name="invPrice" id="invPrice" placeholder="Price"pattern="\d+(\.\d{2})?" <?php if(isset($invPrice)){echo "value='$invPrice'";}  ?>   required>
                    <label>Size</label><input type="number"step=".5" name="invSize" id="invSize" placeholder="Size" <?php if(isset($invSize)){echo "value='$invSize'";}  ?>   required>
                    <label>Weight</label><input type="number" step=".25" name="invWeight" id="invWeight" placeholder="Weight" <?php if(isset($invWeight)){echo "value='$invWeight'";}  ?>   required >
                    <label>Style</label><input type="text" name="invStyle" id="invStyle" placeholder="Style"<?php if(isset($invStyle)){echo "value='$invStyle'";}  ?>   required>
                </fieldset>

                <fieldset>
                    <legend>Product Availability</legend>
                    <label>Available Stock</label><input type="number" name="invStock" id="invStock" placeholder="Available Stock"<?php if(isset($invStock)){echo "value='$invStock'";}  ?>   required>
                    <label>Location</label><input type="text" name="invLocation" id="invLocation" placeholder="Location" <?php if(isset($invLocation)){echo "value='$invLocation'";}  ?>   required >
                    <label>Vendor</label><input type="text" name="invVendor" id="invVendor" placeholder="Vendor" <?php if(isset($invVendor)){echo "value='$invVendor'";}  ?>   required>
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
