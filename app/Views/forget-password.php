<?= $this->extend('layout/auth') ?>
<?= $this->section('content') ?>
<div class="login-box">
    <div class="login-logo">
        <h3 class="mb-4">Forget Password</h3>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">

            <div class="row">
                <div class="col-12" id="errors">
                    <?php
                    if (isset($errors)) {
                        echo '<div class="alert alert-danger" role="alert">';
                        foreach ($errors as $error) {
                            echo '<li>' . $error . '</li>';
                        }
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

            <?php
            $url = base_url() . '/forget-password';
            $attributes = ['class' => 'form', 'id' => 'login-froms'];
            
            ?>
            <form method="post">
            
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            
            <div class="row">
                
                <!-- /.col -->
                <div class="col-6 col-md-6 offset-md-3">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>

                
                <!-- /.col -->
            </div>
            </form>
            <?php //echo form_close(); ?>




        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<?= $this->endSection() ?>
