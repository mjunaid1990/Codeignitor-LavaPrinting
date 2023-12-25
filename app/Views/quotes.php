<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<style>
    .container {
        width: 800px;
        max-width: 100%;
    }
    .bg-header {
        width: 100%;
        height: 200px;
        background-repeat: no-repeat !important;
        background-size: cover !important;
        display: flex;
        align-items: flex-end;
        color: #fff;
        padding-bottom: 20px;
    }
    .quotes-box {
        background-color: #eee;
    }
    .with-bottom-border input {
        border: 0;
        border-bottom: 1px solid #777;
        border-radius: 0;
        padding-left: 0;
        background-color: transparent;
    }
    .with-bottom-border input:focus, .with-bottom-border input:active, .with-bottom-border input:hover {
        background-color: transparent;
    }
    form .row {
        margin-bottom: 15px;
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
        margin-left: 15px !important;
    }
    label.btn.btn-secondary.active {
        box-shadow: none;
        outline: none;
    }
    
</style>
<div class="bg-header" style="background:url('/public/images/quote-bg.png');">
    <div class="bg-overlay"></div>
    <div class="container">
        <h4>Get Quote</h4>
    </div>
</div>
<div class="quotes-box py-5">
    <div class="container">
        
        <?php if (session()->getFlashdata('success') !== NULL) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo session()->getFlashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        <?php endif; ?>
        
        <?php
        $url = base_url() . '/quote';
        $attributes = ['class' => 'qoute', 'id' => 'qoute-froms'];
        ?>
        <?= form_open($url, $attributes) ?>
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="form-group with-bottom-border">
                    <input type="text" name="name" class="form-control" placeholder="Full Name" required="">
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group with-bottom-border">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group with-bottom-border">
                    <input type="text" name="phone" class="form-control" placeholder="Phone" required="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <select name="product" class="form-control" required="">
                        <option value="">Choose your product</option>
                        <?php 
                            if($products) {
                                foreach ($products as $product) {
                                    echo '<option value="'.$product->name.'">'.$product->name.'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <select name="stock_type" class="form-control" required="">
                        <option value="">Choose your stock</option>
                        <option value="12PT Cardstock">12PT Cardstock</option>
                        <option value="12PT Cardstock">12PT Cardstock</option>
                        <option value="12PT Cardstock">12PT Cardstock</option>
                        <option value="12PT Cardstock">12PT Cardstock</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <div class="form-group d-flex">
                        <input type="number" name="qty" class="form-control mr-1" placeholder="Quantity:1" required="">
                        <input type="number" name="qty2" class="form-control mr-1" placeholder="Quantity:2">
                        <input type="number" name="qty3" class="form-control" placeholder="Quantity:3">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="product_unit" id="Inches" value="Inches" checked="">
                        <label class="form-check-label" for="Inches">Inches</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="product_unit" id="CM" value="CM">
                        <label class="form-check-label" for="CM">CM</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="product_unit" id="MM" value="MM">
                        <label class="form-check-label" for="MM">MM</label>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <input type="number" name="product_length" class="form-control" placeholder="Length">
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <input type="number" name="product_width" class="form-control" placeholder="Width">
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <input type="number" name="product_depth" class="form-control" placeholder="Depth">
                </div>
            </div>
        </div>
        
        <div class="row">
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
        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <input class="form-control" id="file" name="file" type="file">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <textarea name="instructions" rows="6" class="form-control" placeholder="Instructions"></textarea>
            </div>
        </div>


        <div class="row">

            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-inline">Send Inquiry</button>
            </div>

            <!-- /.col -->
        </div>
        <?= form_close(); ?>
    </div>
</div>
<!-- /.login-box -->
<?= $this->endSection() ?>
