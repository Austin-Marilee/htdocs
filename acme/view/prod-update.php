<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('Location: /acme/');
}

// Build the categories option list
$catList = '<select name="categoryId" id="categoryId" class="drop-down">';
$catList .= "<option>Choose a Category</option>";
foreach ($categories as $category) {
 $catList .= "<option value='$category[categoryId]'";
  if(isset($categoryId)){
   if($category['categoryId'] === $categoryId){
   $catList .= ' selected ';
  }
 } elseif(isset($prodInfo['categoryId'])){
  if($category['categoryId'] === $prodInfo['categoryId']){
   $catList .= ' selected ';
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
        <title><?php if(isset($prodInfo['invName'])){ echo "Modify $prodInfo[invName] ";} elseif(isset($invName)) { echo $invName; }?> | ACME Inc.</title>
        <meta name="description" content="Modify Products in the ACME Database">

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
<h1><?php if(isset($prodInfo['invName'])){ echo "Modify $prodInfo[invName] ";} elseif(isset($invName)) { echo $invName; }?></h1>
            <div class="req_password"> Please review the form to modify a product. </div>

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
                   <label>Product name:</label><input type="text"  name="invName" id="invName" placeholder="Product Name"  <?php if(isset($invName)){echo "value='$invName'";}  elseif(isset($prodInfo['invName'])) {echo "value='$prodInfo[invName]'"; } ?>   required>
                    <label>Description</label><textarea  name="invDescription" id="invDescription" placeholder="Description" required><?php if(isset($invDescription)){ echo $invDescription; } elseif(isset($prodInfo['invDescription'])) {echo $prodInfo['invDescription']; }?></textarea>
                </fieldset>

                <fieldset>
                    <legend>Product Images</legend>
                    <label>Product image</label> <input type="text" name="invImage" value="/acme/images/no-image.png" id="invImage" placeholder="Product Image" <?php if(isset($invImage)){echo "value='$invImage'";} elseif(isset($prodInfo['invImage'])) {echo "value='$prodInfo[invImage]'"; } ?>   required>
                    <label>Image Thumbnail</label> <input type="text" name="invThumbnail" value="/acme/images/no-image.png" id="invThumbnail" placeholder="Image Thumbnail" <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";} elseif(isset($prodInfo['invThumbnail'])) {echo "value='$prodInfo[invThumbnail]'"; }  ?>   required>
                </fieldset>

                <fieldset>
                    <legend>Product Details</legend>
                    <label>Price</label><input type="number" step="0.5" name="invPrice" id="invPrice" placeholder="Price"pattern="\d+(\.\d{2})?" <?php if(isset($invPrice)){echo "value='$invPrice'";}  elseif(isset($prodInfo['invPrice'])) {echo "value='$prodInfo[invPrice]'"; } ?>   required>
                    <label>Size</label><input type="number"step=".5" name="invSize" id="invSize" placeholder="Size" <?php if(isset($invSize)){echo "value='$invSize'";}  elseif(isset($prodInfo['invSize'])) {echo "value='$prodInfo[invSize]'"; } ?>   required>
                    <label>Weight</label><input type="number" step=".25" name="invWeight" id="invWeight" placeholder="Weight" <?php if(isset($invWeight)){echo "value='$invWeight'";}  elseif(isset($prodInfo['invWeight'])) {echo "value='$prodInfo[invWeight]'"; } ?>   required >
                    <label>Style</label><input type="text" name="invStyle" id="invStyle" placeholder="Style"<?php if(isset($invStyle)){echo "value='$invStyle'";}  elseif(isset($prodInfo['invStyle'])) {echo "value='$prodInfo[invStyle]'"; } ?>   required>
                </fieldset>

                <fieldset>
                    <legend>Product Availability</legend>
                    <label>Available Stock</label><input type="number" name="invStock" id="invStock" placeholder="Available Stock"<?php if(isset($invStock)){echo "value='$invStock'";} elseif(isset($prodInfo['invStock'])) {echo "value='$prodInfo[invStock]'"; } ?>   required>
                    <label>Location</label><input type="text" name="invLocation" id="invLocation" placeholder="Location" <?php if(isset($invLocation)){echo "value='$invLocation'";} elseif(isset($prodInfo['invLocation'])) {echo "value='$prodInfo[invLocation]'"; }  ?>   required >
                    <label>Vendor</label><input type="text" name="invVendor" id="invVendor" placeholder="Vendor" <?php if(isset($invVendor)){echo "value='$invVendor'";}  elseif(isset($prodInfo['invVendor'])) {echo "value='$prodInfo[invVendor]'"; } ?>   required>
                </fieldset>
                
                <fieldset>
                <input type="submit" value="Update Product" class="submitBtn">
                    <!--Add the action key - value pair-->
                    <input type="hidden" name="action" value="updateProd">
                    <input type="hidden" name="invId" value="<?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} elseif(isset($invId)){ echo $invId; } ?>">
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
