<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>



<div class="bodyContent">
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <h2 class="ipt-title">Terms & Conditions</h2>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row py-5">
            <div class="col-12">
                <?= $model->description; ?>
            </div>
        </div>
    </div>
    
</div>

<?= $this->endSection() ?>