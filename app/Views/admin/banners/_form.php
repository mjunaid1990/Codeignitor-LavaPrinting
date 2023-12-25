<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Categories</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/categories">Categories</a></li>
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
                        <label class="control-label" for="name">Name <span class="asteric"></span></label>
                        <input type="text" name="name" value="<?php echo isset($model['name'])?$model['name']:'' ?>" class="form-control" required="" />
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <label class="control-label" for="heading_1">Heading </label>
                        <input type="text" name="heading_1" value="<?php echo isset($model['heading_1'])?$model['heading_1']:'' ?>" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="paragraph_1">Paragraph </label>
                        <input type="text" name="paragraph_1" value="<?php echo isset($model['paragraph_1'])?$model['paragraph_1']:'' ?>" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="item_1">Item 1 </label>
                        <input type="text" name="item_1" value="<?php echo isset($model['item_1'])?$model['item_1']:'' ?>" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="item_2">Item 2 </label>
                        <input type="text" name="item_2" value="<?php echo isset($model['item_2'])?$model['item_2']:'' ?>" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="image">Image </label>
                        <input type="file" name="image" style="display:block;" />
                    </div>    
                    <?php 
                        if(isset($model['image']) && !empty($model['image'])) {
                            $path = WRITEPATH . '/uploads/banners/' . $model['id'] . '/' . $model['image'];
                            if (file_exists($path)) {
                                echo '<div class="form-group"><a target="_blank" href="'.base_url().'/writable/uploads/banners/'.$model['id'].'/'.$model['image'].'">View File</a></div>';
                            }
                        } 
                    ?>   
                    
                    <div class="form-group">
                        <label class="control-label" for="image">Tablet Image </label>
                        <input type="file" name="tablet_image" style="display:block;" />
                    </div>    
                    <?php 
                        if(isset($model['tablet_image']) && !empty($model['tablet_image'])) {
                            $tpath = WRITEPATH . '/uploads/banners/' . $model['id'] . '/' . $model['tablet_image'];
                            if (file_exists($tpath)) {
                                echo '<div class="form-group"><a target="_blank" href="'.base_url().'/writable/uploads/banners/'.$model['id'].'/'.$model['tablet_image'].'">View File</a></div>';
                            }
                        } 
                    ?>
                    
                    <div class="form-group">
                        <label class="control-label" for="image">Mobile Image </label>
                        <input type="file" name="mobile_image" style="display:block;" />
                    </div>    
                    <?php 
                        if(isset($model['mobile_image']) && !empty($model['mobile_image'])) {
                            $mpath = WRITEPATH . '/uploads/banners/' . $model['id'] . '/' . $model['mobile_image'];
                            if (file_exists($mpath)) {
                                echo '<div class="form-group"><a target="_blank" href="'.base_url().'/writable/uploads/banners/'.$model['id'].'/'.$model['mobile_image'].'">View File</a></div>';
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