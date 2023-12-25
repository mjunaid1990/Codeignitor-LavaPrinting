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
                    
                    $attributes = ['id' => 'categories-form'];
                    echo form_open(current_url(), $attributes);
                    
                    if(isset($model)) {
                        if(isset($model['id'])) {
                            echo '<input type="hidden" name="id" value="'.$model['id'].'" />';
                        }
                    }
                    ?>

                    <div class="form-group">
                        <label class="control-label" for="parent_id">Category <span class="asteric">*</span></label>
                        <select class="form-control select2" name="parent_id">
                            <option value="">Select....</option>
                            <?php
                            if($categories) {
                                foreach ($categories as $category) {
                                    $sel = '';
                                    if(isset($model)) {
                                        if(isset($model['parent_id'])) {
                                            if($model['parent_id'] == $category->id) {
                                                $sel = 'selected';
                                            }
                                        }
                                    }
                                    echo '<option value="'.$category->id.'" '.$sel.'>'.$category->name.'</option>';
                                }
                            }
                            ?>

                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="name">Name</label>
                        <input type="text" name="name" value="<?php echo isset($model['name'])?$model['name']:'' ?>" class="form-control" />
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="description">Description</label>
                        <textarea name="description" id="description" class="form-control editor"><?php echo isset($model['description'])?$model['description']:'' ?></textarea>
                    </div>
                    
                    <div class="form-group">
                            <label class="control-label" for="meta_title">Meta Title </label>
                            <input type="text" name="meta_title" value="<?php echo isset($model['meta_title'])?$model['meta_title']:'' ?>" class="form-control" />
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="meta_keyword">Meta Keyword </label>
                            <input type="text" name="meta_keyword" value="<?php echo isset($model['meta_keyword'])?$model['meta_keyword']:'' ?>" class="form-control" />
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="meta_description">Meta Keyword </label>
                            <textarea name="meta_description" class="form-control"><?php echo isset($model['meta_description'])?$model['meta_description']:'' ?></textarea>
                        </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="status">Status <span class="asteric">*</span></label>
                        <select class="form-control select2" name="status">
                            <option value="">Select....</option>
                            <option value="0" <?= isset($model['status']) && $model['status'] == 0?'selected':''; ?>>Inactive</option>
                            <option value="1" <?= isset($model['status']) && $model['status'] == 1?'selected':''; ?>>Active</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" id="submit" class="btn btn-info">Submit</button>
                    </div>
                                        
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
</section>

<?= $this->endSection() ?>