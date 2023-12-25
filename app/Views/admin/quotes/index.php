<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Quotes</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Quotes</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
            <div class="card">
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table-quotes table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Product</th>
                                    <th>Stock Type</th>
<!--                                    <th>Width</th>
                                    <th>Length</th>
                                    <th>Depth</th>
                                    <th>Inches</th>
                                    <th>Color</th>-->
                                    <th>Qty</th>
<!--                                    <th>Qty 2</th>
                                    <th>Qty 3</th>
                                    <th>File</th>
                                    <th>Instructions</th>-->
                                    <th>Created Date</th>
                                    <th style="width: 132px;">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
</section>

<?= $this->endSection() ?>