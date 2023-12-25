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
                    <li class="breadcrumb-item"><a href="/admin/quotes">Quotes</a></li>
                    <li class="breadcrumb-item active"><?= $title; ?></li>
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
                    <h4 class="card-title"><?= $title; ?></h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <td><?= $model['name']; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?= $model['email']; ?></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><?= $model['phone']; ?></td>
                        </tr>
                        <tr>
                            <th>Product</th>
                            <td><?= $model['product']; ?></td>
                        </tr>
                        <tr>
                            <th>Stock Type</th>
                            <td><?= $model['stock_type']; ?></td>
                        </tr>
                        <tr>
                            <th>Width</th>
                            <td><?= $model['product_width']; ?></td>
                        </tr>
                        <tr>
                            <th>Length</th>
                            <td><?= $model['product_length']; ?></td>
                        </tr>
                        <tr>
                            <th>Depth</th>
                            <td><?= $model['product_depth']; ?></td>
                        </tr>
                        <tr>
                            <th>Inches</th>
                            <td><?= $model['product_unit']; ?></td>
                        </tr>
                        <tr>
                            <th>Color</th>
                            <td><?= $model['color']; ?></td>
                        </tr>
                        <tr>
                            <th>Qty</th>
                            <td><?= $model['qty']; ?></td>
                        </tr>
                        <tr>
                            <th>Qty 2</th>
                            <td><?= $model['qty2']; ?></td>
                        </tr>
                        <tr>
                            <th>Qty 3</th>
                            <td><?= $model['qty3']; ?></td>
                        </tr>
                        <tr>
                            <th>File</th>
                            <td>
                                <?php 
                                    if(isset($model['file']) && !empty($model['file'])) {
                                        $path = WRITEPATH . '/uploads/quotes/' . $model['id'] . '/' . $model['file'];
                                        if (file_exists($path)) {
                                            echo '<div class="form-group"><a target="_blank" href="'.base_url().'/writable/uploads/quotes/'.$model['id'].'/'.$model['file'].'">View File</a></div>';
                                        }
                                    } 
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Instructions</th>
                            <td><?= $model['instructions']; ?></td>
                        </tr>
                        <tr>
                            <th>Created Date</th>
                            <td><?= $model['created_at']; ?></td>
                        </tr>
                        
                    </table>
                    
                </div>
            </div>
        </div>
</section>

<?= $this->endSection() ?>