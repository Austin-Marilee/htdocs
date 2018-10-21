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
            <div class="req_password"><img src="../images/site/required.png" alt="Required Symbol"> All fields required

            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
</div>

            <form  method="post" action="/acme/accounts/index.php">
                <label><input type="text" name="clientFirstname" id="clientFirstname" placeholder=" First Name" pattern="[a-zA-Z -._]{1,99}"
                              ></label>
                <label><input type="text" name="clientLastname" id="clientLastname" placeholder=" Last Name"  pattern="[a-zA-Z -._]{1,99}" ></label>
                <label><input type="email" name="clientEmail" id="clientEmail" placeholder=" Email Address"  ></label>
                <label><input type="password" id="clientPassword" name="clientPassword"   placeholder=" Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                              title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"></label>
                <div>
                    <input type="submit" value="Register" class="submitBtn">
                    <!--Add the action key - value pair-->
                    <input type="hidden" name="action" value="register">
                </div>
            </form>
                            <div class="req_password">Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</div>
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
