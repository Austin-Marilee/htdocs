<!DOCTYPE html>
<html lang="en-US">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registration | Acme Inc.</title>
        <meta name="description" content="Registration Form for Acme Inc.">

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
            <h1>Account Setup</h1>
            <div class="req_password">

                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
            </div>

            <form  method="post" action="/acme/accounts/index.php">
                <label>First Name</label><input type="text" name="clientFirstname" id="clientFirstname"  <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?>  required>
                <label>Last Name</label><input type="text" name="clientLastname" id="clientLastname"   <?php if(isset($clientLastname)){echo "value='$clientLastname'";}  ?> required>
                <label>Email Address</label><input type="email" name="clientEmail" id="clientEmail"  <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> required>
                <label>Password</label>
                                <p class="password">Must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character.</p>
                                <input   type="password" id="clientPassword" name="clientPassword"  pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"  
                                 required>

                <div>
                    <input type="submit" value="Register" class="submitBtn">
                    <!--Add the action key - value pair-->
                    <input type="hidden" name="action" value="register">
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
