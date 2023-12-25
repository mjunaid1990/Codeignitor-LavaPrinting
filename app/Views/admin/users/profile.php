<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>
<?php $session = \Config\Services::session(); $user = $session->get('current_user'); ?>
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
                <h1 class="m-0">Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/users">Users</a></li>
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
            if($session->getFlashdata('success')) { 
                ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">Ã—</button>
                  <h5><i class="icon fas fa-check"></i> Message!</h5>
                  <?php echo $session->getFlashdata('success'); ?>
                </div>   
                <?php
            } 
            ?>
            
            <?php 
            if($session->getFlashdata('warning')) { 
                ?>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">Ã—</button>
                  <h5><i class="icon fas fa-check"></i> Message!</h5>
                  <?php echo $session->getFlashdata('warning'); ?>
                </div>   
                <?php
            } 
        ?>
        
        <?php
        $is_update = false;
            if(isset($errors)) {
                echo '<div class="alert alert-danger" role="alert">';
                foreach ($errors as $error) {
                    echo '<li>'.$error.'</li>';
                } 
                echo '</div>';
            }

        $attributes = ['id' => 'register-form','enctype'=>'multipart/form-data'];
        echo form_open(current_url(), $attributes);

        if(isset($model)) {
            if(isset($model['id'])) {
                $is_update = true;
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
                            <label class="control-label" for="firstname">First Name <span class="asteric">*</span></label>
                            <input type="text" name="firstname" value="<?php echo isset($model['firstname'])?$model['firstname']:'' ?>" class="form-control" required="" />
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="lastname">Last Name</label>
                            <input type="text" name="lastname" value="<?php echo isset($model['lastname'])?$model['lastname']:'' ?>" class="form-control" />
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="email">Email <span class="asteric">*</span></label>
                            <input type="email" name="email" value="<?php echo isset($model['email'])?$model['email']:'' ?>" class="form-control" required="" />
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="<?php echo $is_update?'new_password':'password'; ?>">Password <?php echo $is_update?'':'<span class="asteric">*</span>' ?></label>
                            <input type="password" name="<?php echo $is_update?'new_password':'password'; ?>" value="" class="form-control" <?php echo $is_update?'':'required=""'; ?> />
                            <?php
                            if($is_update) {
                                echo '<p><small>Note: if you do not want to change password please leave it empty.</small></p>';
                            }
                            ?>
                        </div>
                        
                        
                        
                        
                        

                    </div>
                </div>
            </div>
            
            <div class="col-md-5 col-12">
                
                
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