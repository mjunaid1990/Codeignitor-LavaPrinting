<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Pages</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/pages">Pages</a></li>
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
                    
                    <?php

                        if(isset($errors)) {
                            echo '<div class="alert alert-danger" role="alert">';
                            foreach ($errors as $error) {
                                echo '<li>'.$error.'</li>';
                            } 
                            echo '</div>';
                        }
                    
                    $attributes = ['id' => 'categories-form','enctype'=>'multipart/form-data'];
                    echo form_open(current_url(), $attributes);
                    
                    if(isset($model)) {
                        if(isset($model['id'])) {
                            echo '<input type="hidden" name="id" value="'.$model['id'].'" />';
                        }
                    }
                    ?>

                    
                    <div class="form-group">
                        <label class="control-label" for="name">Name</label>
                        <input type="text" name="name" value="<?php echo isset($model['name'])?$model['name']:'' ?>" class="form-control" />
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="description">Description</label>
                        <textarea name="description" class="form-control editor"><?php echo isset($model['description'])?$model['description']:'' ?></textarea>
                    </div>  
                    
                    <div class="form-group">
                        <label class="control-label" for="image">Image</label>
                        <input type="file" name="image" style="display: block;" />
                    </div>

                    <?php 
                        if(isset($model['image']) && !empty($model['image'])) {
                            $path = WRITEPATH . '/uploads/pages/' . $model['id'] . '/' . $model['image'];
                            if (file_exists($path)) {
                                echo '<div class="form-group"><a target="_blank" href="'.base_url().'/writable/uploads/pages/'.$model['id'].'/'.$model['image'].'">View File</a></div>';
                            }
                        } 
                    ?>

                    <div class="form-group">
                        <button type="submit" id="submit" class="btn btn-info">Submit</button>
                    </div>
                                        
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
</section>

<?= $this->endSection() ?>