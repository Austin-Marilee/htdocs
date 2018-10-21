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
            <?php echo $navList; ?>
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
            <form action="/acme/accounts/index.php" method="post">
                <label><input type="email" name="clientEmail" id="clientEmail"  placeholder="Email Address" title="Email addres must contain an @ symbol"></label>
                <label><input type="password" name="clientPassword" id="clientPassword"    placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                              title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" ></label>
            </form>
            <div class="button">
                <input type="submit" value="Login" class="submitBtn">
            </div>
            <a href="/acme/accounts/index.php?action=registration"  ><div class="newBtn">Create a New Account</div></a>
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

