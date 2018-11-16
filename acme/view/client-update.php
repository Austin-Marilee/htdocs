<?php
if (!$_SESSION['loggedin']) {
    header('Location: /acme/');
}
unset($_SESSION['message']);
?>
<!DOCTYPE html>
<html lang="en-US">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Account Update | Acme Inc.</title>
        <meta name="description" content="Update a current account with ACME Inc.">

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
            <br>
            <div class="req_password">
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
            </div>
            <h1>Update Account</h1>
            <form  method="post" action="/acme/accounts/">
                <label>First Name</label><input type="text" name="clientFirstname" id="clientFirstname" placeholder="First Name"
                <?php
                //Version from Darlene

                if (isset($clientFirstname)) {
                    echo "value='$clientFirstname'";
                } elseif (isset($_SESSION['clientData']['clientFirstname'])) {
                    echo "value='" . $_SESSION['clientData']['clientFirstname'] . "'";
                }

                //Version from Tutor
//                if (isset($clientFirstname)) {
//                    echo "value='$clientFirstname'";
//                } elseif (isset($clientInfo['clientFirstname'])) {
//                    echo "value='$clientInfo[clientFirstname]'";
//                }
                ?>  required>


                <label>Last Name</label><input type="text" name="clientLastname" id="clientLastname" placeholder="Last Name"<?php
                if (isset($clientLastname)) {
                    echo "value='$clientLastname'";
                } elseif (isset($clientInfo['clientLastname'])) {
                    echo "value='$clientInfo[clientLastname]'";
                }
                ?>  required>

                <label>Email</label><input type="text" name="clientEmail" id="clientEmail" placeholder="Email"                <?php
                if (isset($clientEmail)) {
                    echo "value='$clientEmail'";
                } elseif (isset($clientInfo['clientEmail'])) {
                    echo "value='$clientInfo[clientEmail]'";
                }
                ?>  required>

                <div>
                    <input type="submit" value="Update Account" class="submitBtn">
                    <!--Add the action key - value pair-->
                    <input type="hidden" name="action" value="updateClient">

                    <input type="hidden" name="clientId" value="<?php
                    if (isset($clientInfo['clientId'])) {
                        echo $clientInfo['clientId'];
                    } elseif (isset($clientId)) {
                        echo $clientId;
                    }
                    ?>">
                </div>
            </form>

            <h1>Update Password</h1>

            <form  method="post" action="/acme/accounts/">
                <label>Password</label>
                <p class="password">This will change your password.  Passwords, must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character.</p>
                <input   type="password" id="clientPassword" name="clientPassword" placeholder="Password" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
                         required>
                <div>
                    <input type="submit" value="Update Password" class="submitBtn">
                    <!--Add the action key - value pair-->
                    <input type="hidden" name="action" value="updatePass">
                    <input type="hidden" name="clientId" value="<?php
                    if (isset($clientInfo['clientId'])) {
                        echo $clientInfo['clientId'];
                    } elseif (isset($clientId)) {
                        echo $clientId;
                    }
                    ?>">
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

