<!DOCTYPE html>
<html lang="en-US">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login | ACME inc.</title>
        <meta name="description" content="Login Page for Acme Inc.">

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
            <h1>Please Login</h1>

            <div class="req_password">

                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
            </div>

            <form  method="post" action="/acme/accounts/index.php">
                <label>Email Address</label><input type="email" name="clientEmail" id="clientEmail"  placeholder="Email Address"<?php if (isset($clientEmail)) {
                    echo "value='$clientEmail'"; } ?>  required>

                <label>Password</label>
                <p class="password">Must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character.</p>
                <input type="password" name="clientPassword" id="clientPassword"   placeholder="Password"pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"  required>

                <div>
                    <input type="submit" value="login" class="submitBtn">
                    <!--Add the action key - value pair-->
                    <input type="hidden" name="action" value="login-user">
                </div>
                <a href="/acme/accounts/index.php?action=registration"  ><div class="newBtn">Create a New Account</div></a>

            </form>

        </main>

        <!--footer-->
        <footer class="top-layer">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
        </footer>

        <!--scripts-->
        <script src="/acme/scripts/hamburger.js"></script>
        <script src="/acme/scripts/mainmenu.js"></script>

    </body>
</html>

