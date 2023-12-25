<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<main class="bodyContent"><!---Content START --->
    <section class="contBanner"> <!----SECTION BANNER START----->
        <?php
        
        if($banners) {
            echo '<div class="bannner-single-slider">';
            foreach ($banners as $banner) {
                if(isMobile()) {
                    
                    if($banner->tablet_image) {
                    
                        ?>
                            <div class="banerBg" style="background: url('<?= $bannerModel->featuredImageUrl($banner->id, $banner->tablet_image); ?>')">
                                <div class="overlay">
                                    <div class="container">
                                        <div class="text">
                                            <?= $banner->heading_1; ?>
                                            <?= $banner->paragraph_1; ?>
                                            <p class="item-1"><?= $banner->item_1 ?></p>
                                            <p class="item-2"><?= $banner->item_2 ?></p>
                                            <a href="/quote">Request a Quote</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                }else {
                    ?>
                        <div class="banerBg" style="background: url('<?= $bannerModel->featuredImageUrl($banner->id, $banner->image); ?>')">
                            <div class="overlay">
                                <div class="container">
                                    <div class="text">
                                        <?= $banner->heading_1; ?>
                                        <?= $banner->paragraph_1; ?>
                                        <p class="item-1"><?= $banner->item_1 ?></p>
                                        <p class="item-2"><?= $banner->item_2 ?></p>
                                        <a href="/quote">Request a Quote</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                }
                
            }
            echo '</div>';
        }
        
        ?>
        
    </section><!----SECTION BANNER END----->

    <!----OUR SERVICES----->
    <section class="ourServices">
        <div class="container">
            <div class="row">
                <div class="col-md-3 pl-2 pr-2">
                    <div class="serviseblue" style="background: url('/public/images/blueboxbg.jpg')">
                        <div class="overlay">
                            <a href="#">
                                <div class="image">
                                    <img class="lazy" data-src="/public/images/delivery-icon.png" alt="" />
                                </div>
                                <h3>FREE SHIPPING USA & CANADA</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pl-2 pr-2">
                    <div class="serviseblue" style="background: url('/public/images/blueboxbg.jpg')">
                        <div class="overlay">
                            <a href="#">
                                <div class="image">
                                    <img class="lazy" data-src="/public/images/serviseblue-2.png" alt="" />
                                </div>
                                <h3>PRICE MATCH GUARANTEED</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pl-2 pr-2">
                    <div class="serviseblue" style="background: url('/public/images/blueboxbg.jpg')">
                        <div class="overlay">
                            <a href="#">
                                <div class="image">
                                    <img class="lazy" data-src="/public/images/serviseblue-3.png" alt="" />
                                </div>
                                <h3>STARTING FROM 100 BOXES</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pl-2 pr-2">
                    <div class="serviseblue" style="background: url('/public/images/blueboxbg.jpg')">
                        <div class="overlay">
                            <a href="#">
                                <div class="image">
                                    <img class="lazy" data-src="/public/images/serviseblue-4.png" alt="" />
                                </div>
                                <h3>Free Design Support</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="specialService"><!-----Specialties Services START------>
                <div class="myHeading">
                    <p>WE’RE Lava Printing</p>
                    <h2>Our <span>Specialty</span> Services</h2>
                </div>

                <div class="row">
                    <div class="borderbtm brleftright col-md-4">
                        <div class="apslBox">
                            <div class="icon">
                                <img class="lazy" data-src="/public/images/Icon/Custom-printing-services.png" alt="" />
                            </div>
                            <div class="info">
                                <h2>Custom Printing Services</h2>
                                <p>We do provide 100% customized printing services, free design support for your custom product boxes, or modification in existing product design.</p>
                            </div>
                        </div>
                    </div>
                    <div class="borderbtm col-md-4">
                        <div class="apslBox">
                            <div class="icon">
                                <img class="lazy" data-src="/public/images/no-die-and-plate-charges.png" alt="" />
                            </div>
                            <div class="info">
                                <h2>No Die & Plate Charges</h2>
                                <p>Yes, we offer No Die and Plate charges on any type of your custom designing boxes. Free for your packaging boxes.</p>
                            </div>
                        </div>
                    </div>
                    <div class="borderbtm col-md-4">
                        <div class="apslBox">
                            <div class="icon">
                                <img class="lazy" data-src="/public/images/Icon/No-die-and-plate-charges-icon-2.png" alt="" />
                            </div>
                            <div class="info">
                                <h2>Affordable Pricing</h2>
                                <p>We have very economical prices for our existing and new customers for their custom product packaging boxes. </p>
                            </div>
                        </div>
                    </div>
                    <div class="borderbtm col-md-4">
                        <div class="apslBox">
                            <div class="icon">
                                <img class="lazy" data-src="/public/images/Icon/Satisfication-guranteed.png" alt="" />
                            </div>
                            <div class="info">
                                <h2>Satisfaction Guaranteed</h2>
                                <p>Satisfaction of our clients like yours is our main priority so we do offer a great quality of all our printing products.</p>
                            </div>
                        </div>
                    </div>
                    <div class="borderbtm col-md-4">
                        <div class="apslBox">
                            <div class="icon">
                                <img class="lazy" data-src="/public/images/Icon/Secure-and-easy-check-outs.png" alt="" />
                            </div>
                            <div class="info">
                                <h2>Easy Payment Process</h2>
                                <p>We have dedicated security for this website and do provide hassle-free checkout, you can pay us using PayPal, Credit Card, or Debit Card.</p>
                            </div>
                        </div>
                    </div>
                    <div class="borderbtm col-md-4">
                        <div class="apslBox">
                            <div class="icon">
                                <img class="lazy" data-src="/public/images/Icon/unparalleled-support.png" alt="" />
                            </div>
                            <div class="info">
                                <h2>Unparalleled Support</h2>
                                <p>We have dedicated customer support agents, you can connect us using the live chat option or mail us any time we do respond within hours.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="moreItems">
                    <a href="/quote" class="learnMore">Get Started</a>
                </div>
            </div><!-----Specialties Services END------>
        </div>
    </section><!----OUR SERVICES----->

    <!----Our Packeges Start----->
    <section class="ourPackges">
        <div class="bgImage" style="background: url('/public/images/packgesbg-min.jpeg')">
            <div class="container">
                <div class="myHeading">
                    <h2>Customized <span>Product Printing Boxes</span> By Lava Printing!</h2>
                    <p>Lava Printing uses high quality material to produce custom printing boxes. This trust makes us America’s Premier Printing Company. (minimum 100 boxes order)</p>
                </div>

                <div class="myPackgesSlides packgeSlides">
                    <!---packgeItem---->
                    <?php
                    if($products) {
                        foreach ($products as $product) {
                            ?>
                                <div class="packgeBox">
                                    <div class="image">
                                        <a href="<?= '/product/'.$product->slug; ?>">
                                            <img class="lazy" data-src="<?= $productModel->featuredImageUrlThumb($product->id, $product->featured_image); ?>" alt="<?= $product->name; ?>" />
                                        </a>
                                    </div>
                                    <div class="info">
                                        <a class="title" href="<?= '/product/'.$product->slug; ?>"><?= $product->name; ?></a>
                                        <p><?= strip_tags($product->short_description); ?></p>
                                        <a class="viewPro" href="<?= '/product/'.$product->slug; ?>">View Product</a>
                                    </div>
                                </div>
                            <?php
                        }
                    }
                    ?>
                    

                    
                </div>
                <!---view all product---->
                <div class="moreItems">
                    <a href="/category/cardboard-boxes" class="learnMore">view all product</a>
                </div>
            </div>

        </div>
    </section><!----Our Packeges END----->

    <!----SITE CATEGORIES----->
    <?php /*
    <section class="siteCategories">
        <div class="container">
            <div class="myHeading">
                <h2>Custom Boxes <span>Categories</span></h2>
                <p>Choose your product box from a wide range of our custom printed product boxes and place order with us.</p>
            </div>

            <div class="myCategoresSlides packgeSlides">
                <!---packgeItem---->
                <?php
                    if($categories) {
                        foreach ($categories as $category) {
                            $prod = $catModel->findProdcutByCategoryId($category->id);
                            if($prod) {
                                ?>
                                    <div class="packgeBox">
                                        <div class="image">
                                            <a href="<?= '/category/'.$category->slug; ?>">
                                                <img class="lazy" data-src="<?= $productModel->featuredImageUrlThumb($prod->id, $prod->featured_image); ?>" alt="<?= $prod->name; ?>" />
                                            </a>
                                        </div>
                                        <div class="info">
                                            <a class="title" href="<?= '/category/'.$category->slug; ?>"><?= $category->name; ?></a>
                                            <p><?= strip_tags($category->description); ?></p>
                                            <a class="viewPro" href="<?= '/category/'.$category->slug; ?>">View Category</a>
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                    }
                ?>
                
            </div>
        </div>
    </section>
     * 
     */?>

    <!----CUSTOM PACKGES START----->
    <section class="customPackge">
        <div class="bgImage">
            <div class="overlay">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-9">
                            <h2>TRUSTED BY 500,000+ BUSINESS PROFESSIONALS LIKE YOU</h2>
                            <h3>FOR CUSTOM PRODUCT PRINTING SERVICES</h3>
                        </div>
                        <div class="col-md-3 d-flex align-items-center justify-content-end">
                            <!---Get Started---->
                            <div class="getStarted">
                                <a href="#" class="getStarted">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>    
    </section><!----CUSTOM PACKGES END----->
    <?php /*
    <!----BOX STYLE START---->
    <section class="styleBox">
        <div class="container">
            <div class="myHeading">
                <h2>Personalized Style <span>Boxes</span></h2>
                <p>Select your personalized style boxes from our extensive style boxes categories to match your product needs.</p>
            </div>

            <div class="boxStyleSlides packgeSlides">
                <!---packgeItem---->
                <?php
                    if($boxes_categories) {
                        foreach ($boxes_categories as $box) {
                            $prod2 = $catModel->findProdcutByCategoryId($box->id);
                            if($prod2) {
                                ?>
                                    <div class="packgeBox">
                                        <div class="image">
                                            <a href="<?= '/category/'.$box->slug; ?>">
                                                <img class="lazy" data-src="<?= $productModel->featuredImageUrlThumb($prod2->id, $prod2->featured_image); ?>" alt="<?= $prod2->name; ?>" />
                                            </a>
                                        </div>
                                        <div class="info">
                                            <a class="title" href="<?= '/category/'.$box->slug; ?>"><?= $box->name; ?></a>
                                            <p><?= strip_tags($box->description); ?></p>
                                            <a class="viewPro" href="<?= '/category/'.$box->slug; ?>">View Category</a>
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                    }
                ?>
                
            </div>
        </div>    
    </section><!----BOX STYLE END---->
    */ ?>

    <!-----OUR PROCESS---->
    <section class="ourProcess">
        <div class="container">
            <div class="myHeading">
                <h2>Our Process is <span>Quick And Easy</span></h2>
            </div>
            <div class="processAction">
                <!----PROCESS BOX ---->
                <img class="lazy" data-src="/public/images/12345-icon.png" alt="" style="max-width: 100%;" />
            </div>
        </div>
    </section>

    <!--------->
    <section class="happyCustomer">
        <div class="container">
            <div class="myHeading">
                <p>OUR TESTIMONIALS</p>
                <h2>Our Happy <span>Customer</span></h2>
            </div>

            <div class="infoText">
                <p>Our customer's satisfaction is our top priority and this is the reason they come back for us to get their printing done from us. See below why we're the only go-to printer for marketers, designers, developers, and business owners.</p>
            </div>

            <div class="ourClients">
                <div class="clientBg" style="background: url('/public/images/pattren.png')">

                    <div class="testimonialSlides">
                        <!----CLIENT INFO 1--->
                        <?php
                        if($testimonials) {
                            foreach ($testimonials as $testi) {
                                ?>
                                    <div class="clientBox">
                                        <div class="info">
                                            <div class="image">
                                                <img class="lazy" data-src="<?= $testimonialModel->imageUrl($testi->id, $testi->image); ?>" alt="<?= $testi->name; ?>" />
                                            </div>
                                            <div class="text">
                                                <h5><?= $testi->name; ?></h5>
                                                <span class="d-block"><?= $testi->designation; ?></span>
                                                <span class="d-block">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <div class="text1">
                                            <p class="mb-0"><?= strip_tags($testi->description); ?></p>
                                        </div>
                                        
                                    </div>
                                <?php
                            }
                        }
                        ?>
                        
                    </div>
                </div>
            </div>

        </div>
    </section><!--------->

    <!--------->
    <section class="printingBox">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="myHeading text-center pb-5">
                        <h2>Why <span>Lava Printing</span>?</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="col-md-8 col-12">
                    <div class="aboutInfo">
                        <h4>Stunning Custom Printing Boxes at Lava Printing</h4>
                        <p>Lava Printing is a one-stop shop for all the printing and packaging needs. We provide you with stunning design and finishing choices for custom printing boxes and printed packaging boxes at an extremely low price range if you need custom product packaging boxes in the United States, carbon less forms, stickers, tags, retail packaging, or stationery printing. We offer all of the services needed for printing products or custom packaging within the budget as per client’s expectations regarding custom printed packaging.</p>
                        <p>The complete team of print and packaging experts is available to assist customers. The packing services are unrivaled, trustworthy, and cutting-edge. For retailers as well as manufacturers, we provide wholesale product packaging boxes at attractive rates. The company understands every printing and packing requirement better than anyone else. Get free design options from creative graphic designers by telling us about your company and product needs. We offer free design advice, including no-obligation consultation sessions to help you get exactly what you want for your printed material products.</p>
                        <p>The mission of Lava Printing is to become the most prestigious packaging service business with its cutting-edge printing technology, high quality, and unrivaled customer care.</p>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="image">
                        <img class="lazy" data-src="/public/images/custom-printing-boxes-Lava-printing-boxes-0.jpg" alt="">
                    </div>
                </div>    
            </div>
            <?php if(isMobile()) { ?>
            <div class="row align-items-center mb-3">
                
                <div class="col-md-8 col-12">
                    <div class="aboutInfo">
                        <h4>Custom Printed Boxes and Product Packaging Company</h4>
                        <p>Lava Printing was founded with the objective of establishing new levels of excellence in printing, product packaging, and delivery services. We have always exceeded clients' expectations by providing them with innovative and improved solutions for custom printed boxes, which we have established years ago. The reputation for constantly astound customers with unique printing and packaging items as outstanding product packaging company that meet their particular demands at an affordable price has earned us a stellar reputation among them.</p>
                        <p>Lava Printing has kept honesty by never deceiving customers, communicating with them promptly, and maintaining a long-term connection with each and every one of them, so that they feel like family.</p>
                    </div>
                </div>
                
                <div class="col-md-4 col-12">
                    <div class="image">
                        <img class="lazy" data-src="/public/images/custom-printing-boxes-Lava-printing-boxes-1.jpg" alt="">
                    </div>
                </div>
                    
            </div>
            <?php }else { ?>
            <div class="row align-items-center mb-3">
                <div class="col-md-4 col-12">
                    <div class="image">
                        <img class="lazy" data-src="/public/images/custom-printing-boxes-Lava-printing-boxes-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-8 col-12">
                    <div class="aboutInfo">
                        <h4>Custom Printed Boxes and Product Packaging Company</h4>
                        <p>Lava Printing was founded with the objective of establishing new levels of excellence in printing, product packaging, and delivery services. We have always exceeded clients' expectations by providing them with innovative and improved solutions for custom printed boxes, which we have established years ago. The reputation for constantly astound customers with unique printing and packaging items as outstanding product packaging company that meet their particular demands at an affordable price has earned us a stellar reputation among them.</p>
                        <p>Lava Printing has kept honesty by never deceiving customers, communicating with them promptly, and maintaining a long-term connection with each and every one of them, so that they feel like family.</p>
                    </div>
                </div>
                    
            </div>
            <?php } ?>
            
            <div class="row align-items-center mb-3">
                <div class="col-md-8 col-12">
                    <div class="aboutInfo">
                        <h4>Custom Wholesale Printing and Packaging Boxes</h4>
                        <p>Lava Printing strives to be trendsetters in wholesale packaging boxes industry with a burning desire to explore custom wholesale printing and packaging solutions. The company is always developing and adding new items to wholesale printing services. We want to do everything possible for clients, whether it is in the form of product packaging box design or production. Their confidence and praise motivate the company to give the clients with the best possible service regarding custom packaging boxes at affordable and market-competitive prices.</p>
                        <p>Lava Printing’s goal at all times has been to provide customers with the best experience possible by always prioritizing client satisfaction and happiness. All of the personnel are committed to delivering personalized services in order to achieve goals. The company humbly values the needs and sentiments of clients.It has people on board who are emotionally intelligent in order to understand various sorts of clients and their varying expectations.</p>
                        <p>We're dedicated to providing service around the clock for you! </p>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="image">
                        <img class="lazy" data-src="/public/images/custom-printing-boxes-Lava-printing-boxes-2.jpg" alt="">
                    </div>
                </div>    
            </div>
            
        </div>
    </section>

    <!--------->
    <section class="stuffBuss">
        <div class="bgImage" style="background: url('/public/images/stuff-bg-min.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="myHeading">
                            <p>Free Packaging Design Support</p>
                            <h2>Get a Quote within 5 Minutes</h2>
                        </div>
                        <ul>
                            <li><span><i class="fas fa-check"></i></span> Free Shipping to USA & Canada</li>
                            <li><span><i class="fas fa-check"></i></span> No Die & Plate Charges</li>
                            <li><span><i class="fas fa-check"></i></span> Price Match Guaranteed</li>
                            <li><span><i class="fas fa-check"></i></span> Get Proof before Printing</li>
                        </ul>
                        <div class="moreItems">
                            <a href="/quote" class="learnMore">Get a Quote</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="image">
                            <img class="lazy" data-src="/public/images/lava-printint-boxes-footer.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!----Write A Message----->
    <section class="writeMsg">
        <div class="container">
            <div class="myHeading">
                <h2>You Can Write Us</h2>
            </div>
            <div class="quoitMsg">
                <?php
                $attributes = ['id' => 'contact-form'];
                echo form_open('/contact-message', $attributes);
                ?>
                    <div class="twoFields">
                        <input type="text" name="name" placeholder="name" id="name" required="">
                        <input type="email" name="email" placeholder="email" id="email" required="">
                    </div>
                    <div class="twoFields">
                        <input type="text" name="phone" placeholder="phone" id="phone" required="">
                        <input type="text" name="subject" placeholder="subject" id="subject" required="">
                    </div>
                    <div class="commentBox">
                        <textarea name="messageBox" id="messageBox" placeholder="Message" required=""></textarea>
                    </div>
                    <input type="submit" name="submitmsg" id="submitmsg" value="Send Message">
                    <div class="message"></div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </section><!----Write A Message END----->

    <!---Section Custom Package Start----->
    <section class="customPackge">
        <div class="bgImage">
            <div class="overlay">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-9">
                            <h2>QUALITY PRINTING & <span>COMPETITIVE PRICING</span> ARE GUARANTEED!</h2>
                        </div>
                        <div class="col-md-3 d-flex align-items-center justify-content-end">
                            <!---Get Started---->
                            <div class="getStarted">
                                <a href="/quote" class="getStarted">Get a Quote</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>    
    </section><!---Section Custom Package End----->

</main><!---Content END --->
<?= $this->endSection() ?>