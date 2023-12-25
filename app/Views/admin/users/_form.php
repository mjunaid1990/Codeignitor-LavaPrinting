<?= $this->extend('layouts/admin') ?>
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
                        
                        
                        
                        <div class="form-group">
                            <label class="control-label" for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="1" <?php echo isset($model['status']) && $model['status'] == 1?'selected':'' ?>>Active</option>
                                <option value="0" <?php echo isset($model['status']) && $model['status'] == 0?'selected':'' ?>>In Active</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="col-md-5 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Bank Detail</h4>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label class="control-label" for="bank_account_name">Account Name </label>
                            <input type="text" name="bank_account_name" class="form-control" value="<?php echo isset($model['bank_account_name'])?$model['bank_account_name']:'' ?>" />
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="bank_account_no">Account No. </label>
                            <input type="text" name="bank_account_no" class="form-control" value="<?php echo isset($model['bank_account_no'])?$model['bank_account_no']:'' ?>" />
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="bank_account_routing_no">Routing No. </label>
                            <input type="text" name="bank_account_routing_no" value="<?php echo isset($model['bank_account_routing_no'])?$model['bank_account_routing_no']:'' ?>" class="form-control" />
                        </div>

                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Address</h4>
                    </div>
                    <div class="card-body">

                        
                        
                        <div class="form-group">
                            <label class="control-label" for="address">Address </label>
                            <input type="text" name="address" value="<?php echo isset($model['address'])?$model['address']:'' ?>" class="form-control" />
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="city">City </label>
                            <input type="text" name="city" value="<?php echo isset($model['city'])?$model['city']:'' ?>" class="form-control" />
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="state">State </label>
                            <input type="text" name="state" value="<?php echo isset($model['state'])?$model['state']:'' ?>" class="form-control" />
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="zip">Zip Code </label>
                            <input type="text" name="zip" value="<?php echo isset($model['zip'])?$model['zip']:'' ?>" class="form-control" />
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="country">Country </label>
                            <input type="text" name="country" value="<?php echo isset($model['country'])?$model['country']:'' ?>" class="form-control" />
                        </div>
                        
                        

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