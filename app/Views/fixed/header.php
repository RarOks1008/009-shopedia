<!DOCTYPE html>
<html>
    <head>
        <title>Shopedia</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="author" content="Nikola Nedeljkovic"/>
        <meta name="copyright" content="RarOks 1008 Entertainment @ 2020"/>
        <meta name="robots" content="index,follow"/>
        <meta name="keywords" content="shopping, list, grocery"/>
    	<meta name="description" content="Here you can add your own shopping list and use it from all devices."/>
    	<meta name="abstract" content="Shop with Shopedia."/>
        <link rel="shortcut icon" href="favicon.ico"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"/>
        <link rel="stylesheet" href="assets/css/style.css"/>
    </head>
    <body>
        <div class="header_holder">
            <a href="index.php?page=main">
                <h1>Shopedia</h1>
            </a>
            <?php if(isset($_SESSION["user"])) : ?>
                <a href="api.php?page=logout" class="login_logout_button">Sign Out</a>
            <?php else : ?>
                <a href="index.php?page=login" class="login_logout_button">Sign In</a>
            <?php endif; ?>
        </div>
