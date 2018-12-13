<!DOCTYPE html>
<html lang="en-US">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home | ACME Inc. </title>
        <meta name="description" content="Home Page for Acme Inc.">

        <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet">
        <link href="styles/normalize.css" rel="stylesheet" type="text/css" media="screen"> <!-- normalize useragent/browser defaults -->
        <link href="styles/main.css" rel="stylesheet"  type="text/css" media="screen">    <!-- default styles - small/phone views -->
        <link href="styles/medium.css" rel="stylesheet"  type="text/css" media="screen">  <!-- medium/tablet views -->
        <link href="styles/large.css" rel="stylesheet"  type="text/css" media="screen">   <!-- large/wide/desktop views -->
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

            <h1>Welcome to Acme!</h1>
          
                        <?php
            if (isset($featuredDisplay)) {
                echo $featuredDisplay;
            }
            ?>

            <section class="banner">
                <img class="rocket" src="images/site/rocketfeature.jpg" alt="Roadrunner on a Rocket">
                <ul class="rocket_ad">
                    <li><h2>Acme Rocket</h2></li>
                    <li>Quick lighting fuse</li>
                    <li>NHTSA approved seat belts</li>
                    <li>Mobile launch stand included</li>
                    <li><a href="/acme/products/index.php?action=product"><img id="actionbtn" alt="Add to cart button" src="images/site/iwantit.gif"></a></li>
                </ul>         
            </section>
            <section class="recipies_reviews">
            <section class="reviews">
                <h3>Acme Rocket Reviews</h3>
                <ul class="reviews">
                    <li>"I don't know how I ever caught roadrunners before this." (4/5)</li>
                    <li>"That thing was fast!" (4/5)</li>
                    <li>"Talk about fast delivery." (5/5)</li>
                    <li>"I didn't even have to pull the meat apart." (4.5/5)</li>
                    <li>"I'm on my thirtieth one. I love these things!" (5/5)</li>
                </ul>
            </section>

            <section class="recipes">
                <h3>Featured Recpies</h3>
                <div class="recipeGallery">
                    <figure  class="gallery">
                        <img  src="images/recipes/bbqsand.jpg" alt="Pulled BBQ Sandwich">
                        <figcaption><a href="https://www.tasteofhome.com/recipes/bbq-beef-sandwiches/" title="BBQ Sandwich Recipe"> Roadrunner Tacos</a></figcaption>
                    </figure>

                    <figure  class="gallery">
                        <img src="images/recipes/potpie.jpg" alt="Pot Pie">
                        <figcaption><a href="https://www.tasteofhome.com/collection/top-10-potpie-recipes/" title="Pot Pie Recipe">Roadrunner Pot Pie</a></figcaption>
                    </figure>

                    <figure  class="gallery">
                        <img src="images/recipes/soup.jpg" alt="Soup">
                        <figcaption><a href="https://www.tasteofhome.com/collection/creamy-cheesy-soup-recipes-that-will-melt-your-heart/" title="Soup Recipe">Roadrunner Soup</a></figcaption>
                    </figure>

                    <figure  class="gallery">
                        <img src="images/recipes/taco.jpg" alt="Taco">
                        <figcaption><a href="https://www.tasteofhome.com/recipes/southwestern-fish-tacos/" title="Taco Recipe">Roadrunner Tacos</a></figcaption>
                    </figure>
                </div>                              
            </section>   
            </section>
        </main>

        <!--footer-->
        <footer class="top-layer">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
        </footer>

        <!--scripts-->
        <script src="scripts/hamburger.js"></script>
        <script src="scripts/mainmenu.js"></script>

    </body>
</html>

