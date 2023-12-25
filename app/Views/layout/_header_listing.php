<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!-- HEADER START-->
<header id="siteHeader">
    <div class="topBar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="info">
                        <ul>
                            <li><span><i class="fas fa-mobile-alt"></i></span> Have questions?  <a href="tell:+92 800.362.0277">Call now  +92 800.362.0277</a></li>
                            <li><span><i class="fas fa-comment-dots"></i></span> Need help? <a href="#">Contact us via email</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <div class="countPages">
                        <ul>
                            <li class="icon_1"><a href="/auth/login">Sign In</a></li>
                            <li class="icon_2"><a href="#">My Account</a></li>
                            <li class="icon_3"><a href="#">Checkout <i class="fas fa-shopping-cart"></i> $<span id="cartCount">0.00</span></a></li>
                        </ul>
                    </div>
                    <div class="mediaIcons">
                        <ul>
                            <li><a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a></li>
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


            <div id="mySidenav" class="sidenav">
                <nav id="siteNav">
                    <div class="closeHeader">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    </div>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Other products</a></li>
                        <li><a href="#">blog</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>

                    <div class="qutationForm">
                        <div class="qutationMark">
                            <a href="/quote">Get a Quote</a>
                        </div>
<!--                        <form method="GET" action="">
                            <div class="form-group">
                                <input type="search" id="siteSearch" name="siteSearch" placeholder="Search Product..." />
                                <button id="searchSubmit" name="searchSubmit"><i class="fas fa-search"></i></button>
                            </div>
                        </form>-->
                    </div>
                </nav>     
            </div>

            <div class="openHeader">
                <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
            </div>



        </div>
    </div>
</header><!-- HEADER END-->