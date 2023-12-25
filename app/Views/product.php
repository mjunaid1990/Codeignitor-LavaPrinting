<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?php
$images = $pimagesmodel->findByProductId($model->id);
$qty_arr = [
    100,
    150,
    200,
    250,
    500,
    750,
    1000,
    1500,
    2000,
    2500,
    3000,
    4000,
    5000,
    6000,
    7000,
    8000,
    9000,
    10000,
    15000,
    20000,
    30000,
    40000,
    50000
];
?>
<style>
    form .row {
        margin-bottom: 15px;
    }
    form .row .form-group {
        margin-bottom: 0;
    }
    .btn-group.btn-group-toggle {
        padding: 10px;
        background-color: #ddd;
        width: 100%;
        margin-bottom: 0;
    }
    .btn-group .btn {
        border-radius: 20px !important;
        background-color: #fff;
        color: #777;
        font-size: 13px;
        margin-bottom: 3px;
        margin-right: 3px;
    }

    label.btn.btn-secondary.active {
        box-shadow: none;
        outline: none;
    }
    .quotProInfo input {
        /*border-radius: 0;*/
    }
    .slick-slide img {
        width: 100%;
    }
    section.productDetail .slider-nav .galleryImage img {
        border: 1px solid #0780eb94;
    }
    div.productSummery .proInfo p {
        text-align: justify;
    }
    section.proSec4 .proSpescificInfo .tab_item {
        /*background-color: #333;*/
        box-shadow: none;
        padding: 10px;
    }
    section.proSec4 .proSpescificInfo .tabs span {
        background-color: #333 !important;
        color: #fff !important;
    }
    section.proSec4 .proSpescificInfo .tabs {
        border-bottom: 3px solid #0780eb !important;
    }

    div.proSpescificInfo .tab_item .spacification .list:nth-child(2n) {
        background: #0780eb !important;
        color: #fff !important;
    }
    div.proSpescificInfo .tab_item .spacification .list:nth-child(4n) {
        background: #0780eb !important;
        color: #fff !important;
    }
    div.proSpescificInfo .tab_item .spacification .list:nth-child(6n) {
        background: #0780eb !important;
        color: #fff !important;
    }
    div.proSpescificInfo .tab_item .spacification .list {
        background-color: #fff;
        margin-bottom: 0 !important;
    }
    .proSpescificInfo .tab_item .spacification .list p {
        margin-bottom: 0;
    }
    /*    .form-check label {
            color: #fff;
        }*/
    .spacification h4 {
        /*color: #fff;*/
    }
    .spacification p, .specReview p, .specFaq p {
        /*color: #eee !important;*/
    }
    .specDesc p {
        /*color: #fff !important;*/
    }
    .product-black-box {
        background-color: #333;
        padding: 10px;
        margin-bottom: 15px;
    }
    .product-black-box h2, .product-black-box p {
        color: #fff !important;
    }
    .product-black-box p {
        text-align: justify;
    }
    .quote-banner {
        margin-bottom: 15px;
        background-color: #0780eb;
        padding: 5px 10px;
        border-radius: 4px;
    }
    .quote-banner h2 {
        font-size: 18px !important;
        color: #fff !important;
    }
    .quote-banner .bg-white {
        padding: 5px;
        border-radius: 4px;
    }
    .quote-banner .bg-white p {
        font-size: 13px;
    }
    .quote-banner .bg-white .discount {
        font-size: 18px;
        font-weight: bold;
        margin-right: 3px;
    }
    .quote-banner .bg-white b {
        text-transform: uppercase;
    }
    .quote-banner .bg-white a {
        color: #222;
    }
    .showmore-button {
        cursor: pointer;
        color: #0780eb;
        text-transform: capitalize;
        font-size: 13px;
    }
    section.product-band {
        padding: 20px;
        background-color: #333;
        margin-top: 15px;
    }
    section.product-band .cbox {
        text-align: center;
    }
    section.product-band .cbox h4 {
        font-size: 13px;
        color: #fff;
        margin-top: 10px !important;
    }
    section.product-band .cbox img {
        width: 60px;
    }
    input,
    input::-webkit-input-placeholder {
        font-size: 13px;
    }
    select.form-control {
        font-size: 13px;
    }
    .upload-file {
        margin-bottom: 0 !important;
        padding: 6px;
        background-color: #333;
        color: #fff;
        border-radius: 4px;
        width: 100%;
        text-align: center;
        cursor: pointer;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    @media(max-width: 767px) {
        section.product-band .cbox img {
            width: 40px;
        }
        section.product-band .cbox h4 {
            font-size: 12px;
        }
        form .row {
            margin-bottom: 0;
        }
        form .row .form-group {
            margin-bottom: 10px;
        }
    }
    
    /*faq css*/
    #accordion .card {
        margin-bottom: 15px;
        border: 0;
    }
    #accordion .card-header {
        padding: 0;
        border: 0;
        border-bottom: 0;
    }
    #accordion .card-header a {
        color: rgba(101, 100, 100, 1);
        text-transform: capitalize;
        text-decoration: none;
        font-size: 20px;
        cursor: pointer;
        background-color: #f0f0f0;
        padding: .75rem 1.25rem;
        font-weight: 400;
    }
    #accordion .card-header a:hover {
        color: #000;
        text-decoration: none;
    }
    #accordion .card-header a:not(.collapsed) {
        background-color: #0780eb;
        color: #fff;
    }
    #accordion .card-header a.collapsed:after {
        font-family: "Font Awesome 5 Free"; 
        font-size: 20px;
        font-weight: 900;
        content: "\f078";
        position: absolute;
        right: 15px;
    }
    #accordion .card-header a:not(.collapsed):after {
        font-family: "Font Awesome 5 Free"; 
        font-size: 20px;
        font-weight: 900;
        content: "\f077";
        position: absolute;
        right: 15px;
    }
    
</style>
<main class="bodyContent"><!---Content START --->

    <section class="productDetail pb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="slider-for">
                        <?php
                        if ($model->featured_image) {
                            echo '<div class="mainImage zoom" id="zoom-x">
                                    <img src="' . $pmodel->featuredImageUrl($model->id, $model->featured_image) . '" alt="' . $model->name . '">
                                </div>';
                        }

                        if ($images) {
                            foreach ($images as $k => $image_) {
                                echo '<div class="mainImage zoom" id="zoom-' . $k . '">
                                        <img src="' . $pimagesmodel->featuredImageUrl($image_->product_id, $image_->image) . '" alt="">
                                    </div>';
                            }
                        }
                        ?>

                    </div>
                    <div class="slider-nav">
                        <?php
                        if ($model->featured_image) {
                            echo '<div class="galleryImage">
                                    <img src="' . $pmodel->featuredImageUrl($model->id, $model->featured_image) . '" alt="' . $model->name . '">
                                </div>';
                        }
                        if ($images) {
                            foreach ($images as $img_) {
                                echo '<div class="galleryImage">
                                        <img src="' . $pimagesmodel->featuredImageUrlThumb($img_->product_id, $img_->image) . '" alt="">
                                    </div>';
                            }
                        }
                        ?>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="productSummery">
                        <div class="product-black-box">
                            <h2>
                                <?php
                                $pname = $model->name;
                                $firstpart = strtok($pname, ' ');
                                $lastpart = strstr($pname, ' ');
                                echo $firstpart . ' ' . '<span class="text-blue">' . trim($lastpart) . '</span>';
                                ?>
                            </h2>
                            <p class="mb-0 short-desc"><?= strip_tags($model->short_description); ?></p>
                        </div>

                        <div class="row d-flex justify-content-between quote-banner mx-auto align-items-center">
                            <div class="left-side">
                                <h2>Get a Free Quote</h2>
                            </div>
                            <div class="right-side">
                                <div class="bg-white"><a href="#"><p class="mb-0">up to <span class="discount">85%</span><b>off</b></p></a></div>
                            </div>
                        </div>

                        <!--                        <div class="infoList">
                                                    <img src="/public/images/product-page-image-n.png" alt="" />
                                                </div>-->

                        <div class="quotProInfo bg-wite">
                            <?php
                            $url = base_url() . '/quote-ajax';
                            $attributes = ['class' => 'qoute ajax-form', 'id' => 'qoute-ajax-froms', 'enctype' => 'multipart/form-data'];
                            ?>
                            <?= form_open($url, $attributes) ?>
                            <div class="row">
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <input type="number" name="product_length" class="form-control" placeholder="Length">
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <input type="number" name="product_width" class="form-control" placeholder="Width">
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <input type="number" name="product_depth" class="form-control" placeholder="Depth">
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <select name="product_unit" class="form-control" required="">
                                            <option value="Inches">Inches</option>
                                            <option value="CM">CM</option>
                                            <option value="MM">MM</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <select name="product" class="form-control" required="">
                                            <option value="">Choose your product</option>
                                            <?php
                                            if ($products) {
                                                foreach ($products as $product) {
                                                    $sel = '';
                                                    if ($product->name == $model->name) {
                                                        $sel = 'selected';
                                                    }
                                                    echo '<option value="' . $product->name . '" ' . $sel . '>' . $product->name . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 col-6">
                                    <div class="form-group">
                                        <select name="stock_type" class="form-control" required="">
                                            <option value="">Choose Card Stock</option>
                                            <option value="12pt Card Stock">12pt Card Stock</option>
                                            <option value="14pt Card Stock">14pt Card Stock</option>
                                            <option value="16pt Card Stock">16pt Card Stock</option>
                                            <option value="18pt Card Stock">18pt Card Stock</option>
                                            <option value="20pt Card Stock">20pt Card Stock</option>
                                            <option value="22pt Card Stock">22pt Card Stock</option>
                                            <option value="24pt Card Stock">24pt Card Stock</option>
                                            <option value="Kraft Stock">Kraft Stock</option>
                                            <option value="Corrugated Stock">Corrugated Stock</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6">
                                    <div class="form-group">
                                        <select name="color" class="form-control" required="">
                                            <option value="">Color</option>
                                            <option value="none">None</option>
                                            <option value="1 Color">1 Color</option>
                                            <option value="2 Color">2 Color</option>
                                            <option value="3 Color">3 Color</option>
                                            <option value="4 Color">4 Color</option>
                                            <option value="4/1 Color">4/1 Color</option>
                                            <option value="4/2 Color">4/2 Color</option>
                                            <option value="4/3 Color">4/3 Color</option>
                                            <option value="4/4 Color">4/4 Color</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <select name="qty" class="form-control" required="">
                                            <option value="">Quantity:1</option>
                                            <?php
                                            if ($qty_arr) {
                                                foreach ($qty_arr as $qa) {
                                                    echo '<option value="' . $qa . '">' . $qa . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <select name="qty2" class="form-control" disabled>
                                            <option value="">Quantity:2</option>
                                            <?php
                                            if ($qty_arr) {
                                                foreach ($qty_arr as $q2) {
                                                    echo '<option value="' . $q2 . '">' . $q2 . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <select name="qty3" class="form-control" disabled>
                                            <option value="">Quantity:3</option>
                                            <?php
                                            if ($qty_arr) {
                                                foreach ($qty_arr as $q3) {
                                                    echo '<option value="' . $q3 . '">' . $q3 . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <input class="d-none" id="file" name="file" type="file">
                                        <label class="upload-file">Browse ...</label>
                                    </div>
                                </div>
                            </div>



                            <!--                            <div class="row">
                                                            <div class="col-12">
                                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                                    <label class="btn btn-secondary active">
                                                                        <input type="radio" name="product_cmyk" id="option1" autocomplete="off" value="1/0 CMYK" checked> 1/0 CMYK
                                                                    </label>
                                                                    <label class="btn btn-secondary">
                                                                        <input type="radio" name="product_cmyk" id="option2" autocomplete="off" value="2/0 CMYK" > 2/0 CMYK
                                                                    </label>
                                                                    <label class="btn btn-secondary">
                                                                        <input type="radio" name="product_cmyk" id="option3" autocomplete="off" value="3/0 CMYK" > 3/0 CMYK
                                                                    </label>
                                                                    <label class="btn btn-secondary">
                                                                        <input type="radio" name="product_cmyk" id="option4" autocomplete="off" value="4/0 CMYK" > 4/0 CMYK
                                                                    </label>
                                                                    <label class="btn btn-secondary">
                                                                        <input type="radio" name="product_cmyk" id="option5" autocomplete="off" value="4/1 CMYK" > 4/1 CMYK
                                                                    </label>
                                                                    <label class="btn btn-secondary">
                                                                        <input type="radio" name="product_cmyk" id="option6" autocomplete="off" value="4/2 CMYK" > 4/2 CMYK
                                                                    </label>
                                                                    <label class="btn btn-secondary">
                                                                        <input type="radio" name="product_cmyk" id="option7" autocomplete="off" value="4/3 CMYK" > 4/3 CMYK
                                                                    </label>
                                                                    <label class="btn btn-secondary">
                                                                        <input type="radio" name="product_cmyk" id="option8" autocomplete="off" value="4/4 CMYK" > 4/4 CMYK
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>-->



                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="form-group with-bottom-border">
                                        <input type="text" name="name" class="form-control" placeholder="Full Name" required="">
                                    </div>
                                </div>
                                <div class="col-md-4 col-6">
                                    <div class="form-group with-bottom-border">
                                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                                    </div>
                                </div>
                                <div class="col-md-4 col-6">
                                    <div class="form-group with-bottom-border">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 mb-3">
                                    <textarea name="instructions" rows="3" class="form-control" placeholder="Instructions"></textarea>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-12 display-message">

                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-inline ajax-button">Send Inquiry</button>
                                </div>

                                <!-- /.col -->
                            </div>
                            <?= form_close(); ?>
                        </div>

                        <!--                        <div class="buttonQuot">
                                                    <a href="#" class="quote">Get A Quote</a>
                                                    <a href="#" class="sample">Get Free Samples</a>
                                                </div>
                                                <div class="cardImage">
                                                    <img src="/public/images/product/card.jpg" alt="">
                                                </div>-->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product-band">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="cbox col-4 col-md-2">
                <div class="cbov-img">
                    <img src="/public/images/product/truck-circle.png" />
                </div>
                <h4 class="text-uppercase">Free Shipping</h4>
            </div>
            <div class="cbox col-4 col-md-2">
                <div class="cbov-img">
                    <img src="/public/images/product/Creativity-circle.png" />
                </div>
                <h4 class="text-uppercase">Free Design Support</h4>
            </div>
            <div class="cbox col-4 col-md-2">
                <div class="cbov-img">
                    <img src="/public/images/product/Delivery-box-circle.png" />
                </div>
                <h4 class="text-uppercase">Custom Sizes & Shapes</h4>
            </div>
            <div class="cbox col-4 col-md-2">
                <div class="cbov-img">
                    <img src="/public/images/product/Box-Circle.png" />
                </div>
                <h4 class="text-uppercase">Fast Turnaround Time</h4>
            </div>
            <div class="cbox col-4 col-md-2">
                <div class="cbov-img">
                    <img src="/public/images/product/no-die-plate-charges-circle.png" />
                </div>
                <h4 class="text-uppercase">No die & plate Charges</h4>
            </div>
            <div class="cbox col-4 col-md-2">
                <div class="cbov-img">
                    <img src="/public/images/product/compliance-circle.png" />
                </div>
                <h4 class="text-uppercase">Free Lamination</h4>
            </div>
        </div>
<!--        <img src="/public/images/product-band.png" alt="" style="width: 100%;" />-->
    </section>

    <section class="proSec4 bg-white">
        <div class="container">
            <div class="proSpescificInfo">
                <div class="tabs">
                    <span class="tab">Products Specifications</span>
                    <span class="tab">Description</span>
                    <span class="tab">Reviews</span>   
                    <span class="tab">FAQ</span>   
                </div>
                <div class="tab_content">

                    <div class="tab_item">
                        <div class="spacification">
                            <div class="list">
                                <h4>Paper Stock</h4>
                                <p>10pt to 28pt (60lb to 400lb). Available in Eco-Friendly Kraft, Bux Board, Cardstock, E-flute Corrugated (Available in white & Brown)</p>
                            </div>
                            <div class="list">
                                <h4>Dimensions</h4>
                                <p>Available in any Customized Shape and Size.</p>
                            </div>
                            <div class="list">
                                <h4>Colors</h4>
                                <p>CMYK, PMS colors, Full Color</p>
                            </div>
                            <div class="list">
                                <h4>Quantity</h4>
                                <p>100 - 700,000</p>
                            </div>
                            <div class="list">
                                <h4>Coating</h4>
                                <p> Matte, Gloss, Aqueous Coating and Spot UV </p>
                            </div>
                            <div class="list">
                                <h4>Included Options</h4>
                                <p> Gluing, Scoring, Die Cutting, Perforation. </p>
                            </div>
                            <div class="list">
                                <h4>More Options</h4>
                                <p>Gold/Silver Foiling,Custom Window Cut Out,  Embossing, PVC Sheet, Raised Ink.</p>
                            </div>
                            <div class="list">
                                <h4>File Upload</h4>
                                <p>
                                    Bleeding Include <span style="font-size: 26px;">⅛</span>. 
                                    Files should be in CMYK colors
                                    Send all fonts and fonts in outline form
                                    Image Resolution 300 dpi
                                    Do not embed images, send all linked artwork.
                                </p>
                            </div>
                            <div class="list">
                                <h4>File formats</h4>
                                <p>Ai, PSD(with layers), EPS(Vector)
                                    Press Ready PDF file</p>
                            </div>
                            <div class="list">
                                <h4>Proof</h4>
                                <p>3D Mock-up, Flat View, Free Sample Kit (On Demand)</p>
                            </div>
                            <div class="list">
                                <h4>Turn Around Time</h4>
                                <p>Usually 8-10 Business Days, Rush Production is also Available </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab_item">
                        <div class='specDesc'>
                            <?= $model->description; ?>
                        </div>
                    </div>
                    <div class="tab_item">
                        <div class="specReview">
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
                    <div class="tab_item">
                        <div class="specFaq">
                            <div id="accordion">
                                <?php
                                if($lists) {
                                    $x = 100;
                                    foreach ($lists as $k=>$list) {
                                        ?>
                                            <div class="card">
                                              <div class="card-header" id="heading-<?= $x ?>">
                                                <a class="mb-0 d-block collapsed" data-toggle="collapse" data-target="#collapse-<?= $x ?>" aria-expanded="true" aria-controls="collapse-<?= $x ?>">
                                                  <?= $list->name ?>
                                                </a>
                                              </div>

                                              <div id="collapse-<?= $x ?>" class="collapse <?= $x==0 ?'':''; ?>" aria-labelledby="heading-<?= $x ?>" data-parent="#accordion">
                                                <div class="card-body">
                                                  <?= $list->description; ?>
                                                </div>
                                              </div>
                                            </div>
                                        <?php
                                        $x++;
                                    }
                                }
                                ?>


                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="customPackge">
        <div class="bgImage" style="background: url('/public/images/banner.jpg')">
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
                                <a href="/quote" class="getStarted">Get a Quote</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>    
    </section>



    <section class="siteCategories ProductPage" style="background: #fff !important;">
        <div class="container">
            <div class="myHeading">
                <h2>Similar <span>Products</span></h2>
                <p>Pick from a complete range of custom product packaging boxes from all retail categories</p>
            </div>

            <div class="mySingleProductSlides packgeSlides">
                <!---packgeItem---->
                <?php
                if ($similarProducts) {
                    foreach ($similarProducts as $similar) {
                        ?>
                        <div class="packgeBox">
                            <div class="image">
                                <a href="/product/<?= $similar->slug; ?>">
                                    <img src="<?= $pmodel->featuredImageUrlThumb($similar->id, $similar->featured_image) ?>" alt="" />
                                </a>
                            </div>
                            <div class="info">
                                <a class="title" href="/product/<?= $similar->slug; ?>"><?= $similar->name; ?></a>
                                <a class="viewPro" href="/product/<?= $similar->slug; ?>">View Product</a>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

            </div>
        </div>
    </section>

<!--    <section class="U-Printing">
        <div class="container">
            <div class="myHeading">
                <h2>Lava <span>Printing</span></h2>
            </div>
            <div class="wrapSlick">  
                <div class="slider">
                    <div class="item">
                        <img src="/public/images/product/uprinting-1.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="/public/images/product/uprinting-2.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="/public/images/product/uprinting-3.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="/public/images/product/uprinting-1.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="/public/images/product/uprinting-2.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="/public/images/product/uprinting-3.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>-->

    <section class="ourProcess">
        <div class="container">
            
            <div class="row">
                <div class="col-12 mb-5">
                    <h2 class="mb-0 text-center">Frequently Asked Questions</h2>
                </div>
                <div class="col-12">
                    <div id="accordion">
                        <?php
                        if($lists) {
                            foreach ($lists as $k=>$list) {
                                ?>
                                    <div class="card">
                                      <div class="card-header" id="heading-<?= $k ?>">
                                        <a class="mb-0 d-block collapsed" data-toggle="collapse" data-target="#collapse-<?= $k ?>" aria-expanded="true" aria-controls="collapse-<?= $k ?>">
                                          <?= $list->name ?>
                                        </a>
                                      </div>

                                      <div id="collapse-<?= $k ?>" class="collapse <?= $k==0 ?'':''; ?>" aria-labelledby="heading-<?= $k ?>" data-parent="#accordion">
                                        <div class="card-body">
                                          <?= $list->description; ?>
                                        </div>
                                      </div>
                                    </div>
                                <?php
                            }
                        }
                        ?>


                      </div>

                </div>
            </div>
            
<!--            <div class="myHeading">
                <h2>Our Process is <span>Quick And Easy</span></h2>
            </div>
            <div class="processAction">
                --PROCESS BOX --
                <img class="lazy" data-src="/public/images/12345-icon.png" alt="" style="max-width: 100%;" />
            </div>-->
        </div>
    </section>
    <?php /*
      <section class="SampleKit" style="margin-bottom: 2px;">
      <div class="container">
      <div class="myHeading">
      <h2>REQUEST FREE <span>SAMPLE KIT NOW</span></h2>
      <p>We would love to hear from you, please complete this formand we will get back to you promptly.</p>
      </div>

      <?php
      $url = base_url() . '/sample-kit-ajax';
      $attributes = ['class' => 'sample-kit ajax-form', 'id' => 'sample-kit-froms','enctype'=>'multipart/form-data'];
      ?>
      <?= form_open($url, $attributes) ?>
      <div class="row">
      <div class="col-md-6 pr-md-2">
      <input type="text" name="kitName" id="kitName" placeholder="Name" required="" />
      </div>
      <div class="col-md-6  pl-md-2">
      <input type="email" name="kitEmail" id="kitEmail" placeholder="Email" required="" />
      </div>
      <div class="col-md-6  pr-md-2">
      <input type="text" name="kitPhone" id="kitPhone" placeholder="Phone" required="" />
      </div>
      <div class="col-md-6 pl-md-2">
      <input type="text" name="kitCompany" id="kitCompany" placeholder="Company Name" />
      </div>
      <div class="col-md-6  pr-md-2">
      <input type="text" name="kitMailing" id="kitMailing" placeholder="Mailing Address" />
      </div>
      <div class="col-md-6 pl-md-2">
      <input type="text" name="kitCity" id="kitCity" placeholder="City" />
      </div>
      <div class="col-md-6 pr-md-2">
      <input type="text" name="kitState" id="kitState" placeholder="State" />
      </div>
      <div class="col-md-6 pl-md-2">
      <input type="text" name="kitZip" id="kitZip" placeholder="Zip" />
      </div>
      <div class="col-md-12">
      <input type="submit" class="ajax-button" id="kitSubmit" class="" value="SUBMIT" />
      </div>
      </div>
      <?= form_close(); ?>
      </div>
      </section>

     */ ?>
    <section class="customPackge">
        <div class="bgImage" style="background: url('/public/images/banner.jpg')">
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
    </section>
</main><!---Content END --->
<?= $this->endSection() ?>