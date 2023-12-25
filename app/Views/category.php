<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<style>
    section.proSec4 {
        padding: 20px 0px;
        margin-top: 20px;
    }
    section.proSec4.white-color-tab .proSpescificInfo .tabs span {
        background: #fff;
        color: #222;
    }
    section.proSec4 .proSpescificInfo .tab_item {
        background-color: #333;
        box-shadow: none;
        padding-left: 0;
        padding-right: 0;
    }
    form .row {
        margin-bottom: 15px;
    }
    .form-check label {
        color: #fff;
    }
    .btn-group.btn-group-toggle {
        padding: 10px;
        background-color: #ddd;
        width: 100%;
        margin-bottom: 15px;
        
        
    }
    .btn-group .btn {
        border-radius: 20px !important;
        background-color: #fff;
        color: #777;
        font-size: 13px;
    }
    .btn-secondary+.btn-secondary {
        margin-left: 8px !important;
    }
    label.btn.btn-secondary.active {
        box-shadow: none;
        outline: none;
    }
    .quotProInfo input {
        border-radius: 0;
    }
    .specReview h4 {
        color: #fff;
    }
    .specReview p {
        color: #eee !important;
    }
    .specDesc p {
        color: #fff !important;
    }
    .cat li a {
        font-size: 16px;
    }
    .cat-sidebar.is-mobile {
        background-color: transparent;
    }
    .is-mobile .cat {
        margin-top: 20px;
        background-color: #eee;
        padding: 15px;
    }
</style>
<main class="bodyContent" style="padding: 50px 0;background-color: #f9f9f9;"><!---Content START --->
    
    
    <div class="container">
        <div class="row">
            <div class="col-md-2 px-0 mb-3 col-12">
                <div class="cat-sidebar <?= isMobile()?'is-mobile':''; ?>">
                    <?php if(isMobile()) { ?>
                        <button class="btn btn-primary btn-toggle-cat" type="button"><i class="fa fa-bars"></i> Browse By</button>
                    <?php }else { ?>
                        <h4 class="mb-4">Browse By</h4>
                    <?php } ?>
                        <ul class="cat" style="<?= isMobile()?'display:none;':''; ?>">
                        <?php
                        if($categories) {
                            foreach ($categories as $category_) {
                                $active = '';
                                if($category_->status == 1) {
                                    if($category_->id == $model->id) {
                                        $active = 'active';
                                    }
                                    echo '<li class="c-item"><a class="'.$active.'" href="/category/'.$category_->slug.'"><i class="fa fa-caret-right"></i>'.$category_->name.'</a></li>';
                                }
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-12">
                
                <div class="listing-wrap">
                    
                    <h4 class="mb-4"><?= $model->name; ?></h4>
                    
                    <div class="row w-100 m-0 m-auto">
                        <?php
                        if($products) {
                            foreach ($products as $product) {
                                ?>
                                    <div class="packgeSlides col-md-3 col-12">
                                        <div class="packgeBox">
                                            <div class="image">
                                                <a href="/product/<?= $product->slug; ?>">
                                                    <img src="<?= $pmodel->featuredImageUrlThumb($product->id, $product->featured_image); ?>" alt="<?= $product->name; ?>" />
                                                </a>
                                            </div>
                                            <div class="info">
                                                <a class="title" href="/product/<?= $product->slug; ?>"> <?= $product->name; ?></a>
                                                
                                                <a class="viewPro" href="/product/<?= $product->slug; ?>">View Product</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                
                <div class="cat-desc mt-3">
                    <h4>Description</h4>
                    <?= $model->description; ?>
                </div>
                
                
                
                
            </div>
        </div>
    </div>
</main><!---Content END --->
<?= $this->endSection() ?>