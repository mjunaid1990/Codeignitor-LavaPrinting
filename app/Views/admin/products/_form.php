<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #17a2b8 !important;
        border: 1px solid #17a2b8 !important;
    }
</style>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Products</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/products">Products</a></li>
                    <li class="breadcrumb-item active"><?= $title; ?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <?php

            if(isset($errors)) {
                echo '<div class="alert alert-danger" role="alert">';
                foreach ($errors as $error) {
                    echo '<li>'.$error.'</li>';
                } 
                echo '</div>';
            }

        $attributes = ['id' => 'products-form','enctype'=>'multipart/form-data'];
        echo form_open(current_url(), $attributes);

        if(isset($model)) {
            if(isset($model['id'])) {
                echo '<input type="hidden" name="id" value="'.$model['id'].'" />';
            }
        }
        ?>
        <div class="row">
            <div class="col-md-7 col-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?= $title; ?></h4>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label class="control-label" for="name">Name</label>
                            <input type="text" name="name" value="<?php echo isset($model['name'])?$model['name']:'' ?>" class="form-control" />
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="short_description">Short Description</label>
                            <textarea name="short_description" id="short_description" class="form-control editor"><?php echo isset($model['short_description'])?$model['short_description']:'' ?></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="description">Description</label>
                            <textarea name="description" id="description" class="form-control editor"><?php echo isset($model['description'])?$model['description']:'' ?></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="category_id">Category <span class="asteric">*</span></label>
                            <select class="form-control select2" name="category_id" required="">
                                <option value="">Select....</option>
                                <?php
                                if($categories) {
                                    foreach ($categories as $category) {
                                        $sel = '';
                                        if(isset($model)) {
                                            if(isset($model['category_id'])) {
                                                if($model['category_id'] == $category->id) {
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
                            <label class="control-label" for="featured_image">Featured Image</label>
                            <input type="file" name="featured_image" style="display: block;" />
                        </div>
                        
                        <?php 
                            if(isset($model['featured_image']) && !empty($model['featured_image'])) {
                                $path = WRITEPATH . '/uploads/' . $model['id'] . '/' . $model['featured_image'];
                                if (file_exists($path)) {
                                    echo '<div class="form-group"><a target="_blank" href="'.base_url().'/writable/uploads/'.$model['id'].'/'.$model['featured_image'].'">View File</a></div>';
                                }
                            } 
                        ?>
                        <br />
                        <hr />
<br />
                        <div class="form-group">
                            <label class="control-label" for="meta_title">Meta Title </label>
                            <input type="text" name="meta_title" value="<?php echo isset($model['meta_title'])?$model['meta_title']:'' ?>" class="form-control" />
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="meta_keyword">Meta Keyword </label>
                            <input type="text" name="meta_keyword" value="<?php echo isset($model['meta_keyword'])?$model['meta_keyword']:'' ?>" class="form-control" />
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="meta_description">Meta Description </label>
                            <textarea name="meta_description" class="form-control"><?php echo isset($model['meta_description'])?$model['meta_description']:'' ?></textarea>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="slug">Slug </label>
                            <input type="text" name="slug" value="<?php echo isset($model['slug'])?$model['slug']:'' ?>" class="form-control" />
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-5 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Multiple Files</h4>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <input id="file_input" type="file" name="files[]" multiple="">
                        </div>
                        <?php
                        if(isset($pimages) && !empty($pimages)) {
                            echo '<br /><hr /><br /><div class="d-flex align-items-center justify-content-start" style="flex-flow: wrap;">';
                            foreach ($pimages as $img) {
                                $path = WRITEPATH . '/uploads/products/' . $img->product_id . '/' . $img->image;
                                if (file_exists($path)) {
                                    echo '<div class="form-group image-'.$img->id.'" style="position: relative;"><a class="remove-file" href="/admin/products/remove/'.$img->id.'/'.$img->product_id.' "><i class="fa fa-times"></i></a><img src="'.base_url().'/writable/uploads/products/'. $img->product_id . '/' . $img->image.'" style="width: 160px;"></div>';
                                }
                            }
                            echo '</div>';
                        }
                        ?>
                        
                        

                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <button type="submit" id="submit" class="btn btn-info">Submit</button>
                </div>
            </div>
        </div>
        
            
        <?php echo form_close(); ?>
        </div>
</section>

<?= $this->endSection() ?>