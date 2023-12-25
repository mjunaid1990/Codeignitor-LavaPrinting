<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>
<?php $session = \Config\Services::session(); $user = $session->get('current_user'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Settings</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Settings</li>
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

            if(isset($errors)) {
                echo '<div class="alert alert-danger" role="alert">';
                foreach ($errors as $error) {
                    echo '<li>'.$error.'</li>';
                } 
                echo '</div>';
            }

        $attributes = ['id' => 'settings-form','enctype'=>'multipart/form-data'];
        echo form_open(current_url(), $attributes);
        ?>
       
        
        <div class="row">
            
            
            
            <div class="col-md-6 col-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Site</h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if($site_settings) {
                            foreach ($site_settings as $site) {
                                $pname = str_replace('_', ' ', $site->name);
                                
                                ?>
                                    <div class="form-group">
                                        <label class="control-label" for="name"><?php echo ucfirst($pname); ?></label>
                                        <input type="text" name="<?php echo $site->name; ?>" value="<?php echo $site->value; ?>" class="form-control" />
                                    </div>
                                <?php
                            }
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