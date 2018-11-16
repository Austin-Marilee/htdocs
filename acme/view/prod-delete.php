<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('Location: /acme/');
}
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName] ";} ?> | ACME Inc.</title>
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
<h1><?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName] ";} ?></h1>
            <div class="req_password"> The delete is permanent. Please confirm product deletion. </div>

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
  <label for="invName">Product Name</label>
  <input type="text" readonly name="invName" id="invName" <?php if(isset($prodInfo['invName'])) {echo "value='$prodInfo[invName]'"; }?>>
  <label for="invDescription">Product Description</label>
  <textarea name="invDescription" readonly id="invDescription"><?php if(isset($prodInfo['invDescription'])) {echo $prodInfo['invDescription']; } ?></textarea>
                </fieldset>
               
                <fieldset>
                <input type="submit" value="Delete Product" class="submitBtn">
                    <!--Add the action key - value pair-->
                    <input type="hidden" name="action" value="deleteProd">
                    <input type="hidden" name="invId" value="<?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];}  ?>">
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
