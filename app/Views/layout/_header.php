<?php

$catModel = new \App\Models\CategoriesModel();
$prodModel = new \App\Models\ProductsModel();
$byIndustries = $catModel->findByParentID(1);
$byBoxstyles = $catModel->findByParentID(2);
$otherproducts = $catModel->findByParentID(3);

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
    @media (min-width: 992px){
        .dropdown-menu .dropdown-toggle:after{
            border-top: .3em solid transparent;
            border-right: 0;
            border-bottom: .3em solid transparent;
            border-left: .3em solid;
        }
        .dropdown-menu .dropdown-menu{
            margin-left:0; margin-right: 0;
        }
        .dropdown-menu li{
            position: relative;
        }
        .nav-item .submenu{ 
            display: none;
            position: absolute;
            left:100%; top:-7px;
        }
        .nav-item .submenu-left{ 
            right:100%; left:auto;
        }
        .dropdown-menu > li:hover{ background-color: #f1f1f1 }
        .dropdown-menu > li:hover > .submenu{
            display: block;
        }
    }
</style>
<!-- HEADER START-->
<header id="siteHeader">
    <div class="topBar">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <div class="col-6">
                    <div class="info">
                        <ul>
                            <li><span><i class="fas fa-mobile-alt"></i></span> Have questions?  <a href="tel:+18502528282">Call now  +1 (850) 252-8282</a></li>
                            <li><span><i class="fas fa-comment-dots"></i></span> Need help? <a href="/contact-us">Contact us via email</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-end">
<!--                    <div class="countPages">
                        <ul>
                            <li class="icon_1"><a href="/auth/login">Sign In</a></li>
                            <li class="icon_2"><a href="#">My Account</a></li>
                            <li class="icon_3"><a href="#">Checkout <i class="fas fa-shopping-cart"></i> $<span id="cartCount">0.00</span></a></li>
                        </ul>
                    </div>-->
                    <div class="mediaIcons">
                        <ul>
                            <li><a href="https://web.facebook.com/lavaprintingusa" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://twitter.com/lavaprinting" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/lavaprintingusa/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/lavaprinting/" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="https://www.pinterest.com/lavaprinting" target="_blank"><i class="fab fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="navigation">
        <div class="container">
            <div class="logo">
                <a href="/">
                    <img src="/public/images/lava-printing-logo-f.png" alt="logo">
                </a>
            </div>
            <?php if(isMobile()) { ?>
            <ul class="mobile_menu">
                <li><a href="/">Home</a></li>
                <li><a href="/about-us">About Us</a></li>
                <li>
                    <a href="#">By Industry</a>
                    <ul class="submenu">
                        <?php
                        if($byIndustries) {
                            foreach ($byIndustries as $industry) {
                                $industry_products = $prodModel->findByCategory($industry->id);
                                if($industry_products) {
                                    ?>
                                    <li>
                                        <a href="#"> <?= $industry->name; ?> </a>
                                        <ul class="submenu">
                                            <?php
                                                foreach ($industry_products as $inp) {
                                                    echo '<li><a href="/product/'.$inp->slug.'">'.$inp->name.'</a></li>';
                                                }
                                            ?>
                                        </ul>
                                    </li>
                                        
                                    <?php
                                                
                                }else {
                                    ?><li><a href="/category/<?= $industry->slug; ?>"> <?= $industry->name; ?> </a></li><?php
                                }
                                ?>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </li>
                <?php /*
                <li>
                    <a href="#">By Box Style</a>
                    <ul class="submenu">
                        <?php
                        if($byBoxstyles) {
                            foreach ($byBoxstyles as $box) {
                                $box_products = $prodModel->findByCategory($box->id);
                                if($box_products) {
                                    ?>
                                        <a href="/category/<?= $box->slug; ?>"> <?= $box->name; ?> </a>
                                        <ul class="submenu">
                                            <?php
                                                foreach ($box_products as $bproduct) {
                                                    echo '<li><a href="/product/'.$bproduct->slug.'"> '.$bproduct->name.'</a></li>';
                                                }
                                            ?>
                                        </ul>
                                    <?php
                                                
                                }else {
                                    ?><a href="/category/<?= $box->slug; ?>"> <?= $box->name; ?> </a><?php
                                }
                                ?>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </li>
                 * 
                 * 
                 */ ?>
                <?php if($otherproducts && count($otherproducts) > 0) { ?>
                <li>
                    <a href="#">Other Products</a>
                    <ul class="submenu">
                        <?php
                            foreach ($otherproducts as $other) {
                                $o_products = $prodModel->findByCategory($other->id);
                                if($o_products) {
                                    ?>
                                        <a href="/category/<?= $other->slug; ?>"> <?= $other->name; ?> </a>
                                        <ul class="submenu">
                                            <?php
                                                foreach ($o_products as $oproduct) {
                                                    echo '<li><a href="/product/'.$oproduct->slug.'"> '.$oproduct->name.'</a></li>';
                                                }
                                            ?>
                                        </ul>
                                    <?php
                                                
                                }else {
                                    ?><a href="/category/<?= $other->slug; ?>"> <?= $other->name; ?> </a><?php
                                }
                                ?>
                                <?php
                            }
                        ?>
                    </ul>
                </li>
                <?php } ?>
                <li><a href="/contact-us">Contact Us</a></li>
                <li><a href="/quote">Get a Quote</a></li>
                
              </ul>
            <?php }else { ?>
            <nav class="navbar navbar-expand-lg bg-white">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="main_nav">

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"> <a class="nav-link" href="/"> Home </a> </li>
                        <li class="nav-item"> <a class="nav-link" href="/about-us"> About Us </a> </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">  By Industry  </a>
                            <ul class="dropdown-menu">
                                <?php
                                if($byIndustries) {
                                    foreach ($byIndustries as $industry) {
                                        $industry_products = $prodModel->findByCategory($industry->id);
                                        ?>
                                        <li>
                                            <a class="dropdown-item" href="/category/<?= $industry->slug; ?>"> <?= $industry->name; ?> <?= $industry_products?'<i class="fa fa-chevron-right"></i>':''; ?> </a>
                                            <?php if($industry_products) { ?>
                                                <ul class="submenu dropdown-menu">
                                                    <?php
                                                        foreach ($industry_products as $iproduct) {
                                                            echo '<li><a class="dropdown-item" href="/product/'.$iproduct->slug.'"> '.$iproduct->name.'</a></li>';
                                                        }
                                                    ?>
                                                </ul>
                                            <?php } ?>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                                
                                
                            </ul>
                        </li>
                        <?php /*
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">  By Box Style  </a>
                            <ul class="dropdown-menu">
                                <?php
                                if($byBoxstyles) {
                                    foreach ($byBoxstyles as $box) {
                                        $box_products = $prodModel->findByCategory($box->id);
                                        ?>
                                        <li>
                                            <a class="dropdown-item" href="/category/<?= $box->slug; ?>"> <?= $box->name; ?> <?= $box_products?'<i class="fa fa-chevron-right"></i>':''; ?> </a>
                                            <?php if($box_products) { ?>
                                                <ul class="submenu dropdown-menu">
                                                    <?php
                                                        foreach ($box_products as $bproduct) {
                                                            echo '<li><a class="dropdown-item" href="/product/'.$bproduct->slug.'"> '.$bproduct->name.'</a></li>';
                                                        }
                                                    ?>
                                                </ul>
                                            <?php } ?>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </li>
                         * 
                         */ ?>
                        <?php if($otherproducts && count($otherproducts) > 0) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">  Other Products  </a>
                            <ul class="dropdown-menu">
                                <?php
                                    foreach ($otherproducts as $other) {
                                        $o_products = $prodModel->findByCategory($other->id);
                                        ?>
                                        <li>
                                            <a class="dropdown-item" href="/category/<?= $other->slug; ?>"> <?= $other->name; ?> <?= $o_products?'<i class="fa fa-chevron-right"></i>':''; ?> </a>
                                            <?php if($o_products) { ?>
                                                <ul class="submenu dropdown-menu">
                                                    <?php
                                                        foreach ($o_products as $oproduct) {
                                                            echo '<li><a class="dropdown-item" href="/product/'.$oproduct->slug.'"> '.$oproduct->name.'</a></li>';
                                                        }
                                                    ?>
                                                </ul>
                                            <?php } ?>
                                        </li>
                                        <?php
                                    }
                                ?>
                            </ul>
                        </li>
                        <?php } ?>
                        <!--<li class="nav-item"> <a class="nav-link" href="#"> Blog </a> </li>-->
                        
                        <li class="nav-item"> <a class="nav-link" href="/contact-us"> Contact Us </a> </li>
                        <li class="nav-item quote-link"> <a class="nav-link btn btn-primary" href="/quote"> Get a Quote </a></li>
                    </ul>
                    
                    <!--<form class="form-inline my-2 my-lg-0">-->
                        <!--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
<!--                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
                    <!--</form>-->

                </div> <!-- navbar-collapse.// -->
            </nav>
            <?php } ?>




        </div>
    </div>
</header><!-- HEADER END-->