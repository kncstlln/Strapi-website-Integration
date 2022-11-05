<?php

require "vendor/autoload.php";

use GuzzleHttp\Client;

function showHome() {
    $token = '962dae301e353d29b87f58ab39a3fb20e59a8fddb092b191bc06afae6de66b0cee965e67b713c62009338a982304a369c1f76e491438000297c9554cafbc249fe560ab27ed7f1e2e631eaaf4af57bb33206e2bd3a3058e44ce948694a65510da17a2912d8e0f3eb06399f10eb4a05cf7d94ce6b71c2712a68a60a8beedd1b4b2';

    $client = new Client([
        'base_uri' => 'http://localhost:1337/api/',
    ]);

    $headers = [
        'Authorization' => 'Bearer ' . $token,
        'Accept'        => 'application/json',
    ];

    $response = $client->request('GET', 'home', [
        'headers' => $headers
    ]);

    $body = $response->getBody();
    return json_decode($body);
    
}

$home = showHome();
$headerLogo=$home->data->attributes->headerLogo;
$heroSection=$home->data->attributes->heroSection;
$featuredProducts=$home->data->attributes->featuredProducts;
$latestProducts=$home->data->attributes->latestProducts;
$testimonials=$home->data->attributes->testimonials;
$footerLogo=$home->data->attributes->footerLogo;
$footerSlogan=$home->data->attributes->footerSlogan;
var_dump($heroSection);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RedStore | Ecommerce Website Design</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                <?php
                // foreach($home->data as $homeData){ 
                //$home = $homeData->attributes;?>
                    <a href="index.html"><img src=<?=$headerLogo?> alt="logo" width="125px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="products.html">Products</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                        <li><a href="account.html">Account</a></li>
                    </ul>
                </nav>
                <a href="cart.html"><img src="images/cart.png" width="30px" height="30px"></a>
                <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
            </div>
            <div class="row">
                <div class="col-2">
                    <h1><?=$heroSection->title?></h1>
                    <p><?=$heroSection->description?></p><br>
                    <p><?=$heroSection->break?></p>
                    <a href="" class="btn">Explore Now &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="images/image1.png">
                </div>
            </div>
        </div>
    </div>

    <!-- Feadtued Categories -->
    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img src="images/category-1.jpg">
                </div>
                <div class="col-3">
                    <img src="images/category-2.jpg">
                </div>
                <div class="col-3">
                    <img src="images/category-3.jpg">
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Products -->
    
    <div class="small-container">
        <h2 class="title">Featured Products</h2>
        <div class="row">
        <?php foreach ($featuredProducts as $products){?>
            <div class="col-4">
                <a href="product_details.html"><img src=<?=$products->image?>></a>
                <h4><?=$products->name?></h4>
                <div class="rating" data-stars="5">
                <?php for($i=1; $i <=$products->stars; $i++){?>
                    <i class="fa fa-star"></i>
                <?php } ?>
                <?php for($i=1; $i <=(5-$products->stars); $i++){?>
                    <i class="fa fa-star-o"></i>
                <?php } ?>
                </div>
                <?=$products->price?>
            </div>
            <?php } ?>
        </div>
        <h2 class="title">Latest Products</h2>
        <div class="row">
        <?php foreach ($latestProducts as $products){?>
            <div class="col-4">
                <img src=<?=$products->image?>>
                <h4><?=$products->name?></h4>
                <div class="rating" data-stars="5">
                <?php for($i=1; $i <=$products->stars; $i++){?>
                    <i class="fa fa-star"></i>
                <?php } ?>
                <?php for($i=1; $i <=(5-$products->stars); $i++){?>
                    <i class="fa fa-star-o"></i>
                <?php } ?>
                </div>
                <p><?=$products->price?></p>  
            </div>
            <?php } ?>
        </div>
    </div>

    <!-- Offer -->
    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="images/exclusive.png" class="offer-img">
                </div>
                <div class="col-2">
                    <p>Exclusively Available on RedStore</p>
                    <h1>Smart Band 4</h1>
                    <small>The Mi Smart Band 4 fearures a 39.9%larger (than Mi Band 3) AMOLED color full-touch display
                        with adjustable brightness, so everything is clear as can be.<br></small>
                    <a href="products.html" class="btn">Buy Now &#8594;</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial -->
    <div class="testimonial">
        <div class="small-container">
            <div class="row">
                <?php foreach ($testimonials as $review){?>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p><?=$review->testimonial?></p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <img src=<?=$review->picture?>>
                    <h3><?=$review->name?></h3>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Brands -->

    <div class="brands">
        <div class="small-container">
            <div class="row">
                <div class="col-5">
                    <img src="images/logo-godrej.png">
                </div>
                <div class="col-5">
                    <img src="images/logo-oppo.png">
                </div>
                <div class="col-5">
                    <img src="images/logo-coca-cola.png">
                </div>
                <div class="col-5">
                    <img src="images/logo-paypal.png">
                </div>
                <div class="col-5">
                    <img src="images/logo-philips.png">
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and ios mobile phone.</p>
                    <div class="app-logo">
                        <img src="images/play-store.png">
                        <img src="images/app-store.png">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src=<?=$footerLogo?>>
                    <p><?=$footerSlogan?>
                    </p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Follow Us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>Youtube</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright 2020 - Samwit Adhikary</p>
        </div>
    </div>

    <!-- javascript -->

    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";
        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px"
            }
            else {
                MenuItems.style.maxHeight = "0px"
            }
        }
    </script>

</body>

</html>