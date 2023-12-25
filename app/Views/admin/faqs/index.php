<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Faqs</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Faqs</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"></h4>
                    <div class="card-tools">
                        <a type="button" href="<?php echo base_url(); ?>/admin/faqs/add" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table-faqs table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th style="width: 132px;">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            
        </div>
</section>

<?= $this->endSection() ?>