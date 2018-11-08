<!--header-->
<a href="http://Localhost/acme/index.php"><img class="logo"  src="/acme/images/site/logo.gif" alt="The site logo"></a>

<div class="folder">
    <?php
    if (isset($cookieFirstname)) {
        echo "<span>Welcome $cookieFirstname</span>";
    }
    ?>
    <br>
    <?php
    if ($_SESSION['loggedin'] = TRUE) {
        echo '<a href="/acme/accounts/index.php?action=logout"><p class="adminBtn">Logout</p></a>';
    } else {
        echo '<a href="/acme/accounts/index.php?action=login"><img   class="folder" src="/acme/images/site/account.gif" alt="Image of a folder">My Account</a>';
    }
    ?>

</div>
