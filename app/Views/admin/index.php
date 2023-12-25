<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<?php
$quoteModel = new \App\Models\QuotesModel();
$today = $quoteModel->today_quotes();
$month = $quoteModel->month_quotes();
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $today?$today:0; ?></h3>
                        <p>Today Quotes</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-chatbubbles"></i>
                    </div>
                    <a href="/admin/quotes" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                
                
                
            </div>
            
            <div class="col-lg-3 col-6">

                               
                
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $month?$month:0; ?></h3>
                        <p>This Month Quotes</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-chatbubbles"></i>
                    </div>
                    <a href="/admin/quotes" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                
                
            </div>
            
        </div>
    </div>
</section>

<?= $this->endSection() ?>