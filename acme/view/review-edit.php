<!DOCTYPE html>
<html lang="en-US">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit Reviews | ACME Inc. </title>
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
<h1><?php if(isset($specificReview['invName'])){ echo "Edit $specificReview[invName] Review ";} elseif(isset($invName)) { echo $invName; }?></h1>

            <div class="req_password">            
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
            </div>

            <form  method="post" action="/acme/reviews/">
                <fieldset>
                    <label>Product Review</label><textarea  name="reviewText" id="reviewText" placeholder="Description" required><?php if(isset($reviewText)){ echo $reviewText; } elseif(isset($specificReview['reviewText'])) {echo $specificReview['reviewText']; }?></textarea>
                <input type="submit" value="Submit Edited Review" class="reviewBtn">
                </fieldset>
                <input type="hidden" name="action" value="updateReview">
                <input type="hidden" name="reviewId" value="<?php if(isset($specificReview['reviewId'])){echo $specificReview['reviewId'];} else if(isset($reviewId)){echo $reviewId;}?>">
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


