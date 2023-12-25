<?= $this->extend('layout/auth') ?>
<?= $this->section('content') ?>

<style>
    .login-box {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        background-color: #f8f8f8;
    }
    .login-box .card {
        width: 400px;
        max-width: 100%;
    }
</style>

<div class="login-box">
    <div class="login-logo">
        <h3 class="mb-4">Register</h3>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg mb-2">Sign up to start ...</p>
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
            $url = base_url() . '/register';
            $attributes = ['class' => 'form', 'id' => 'login-froms'];
            ?>
            <?= form_open($url,$attributes) ?>
                <div class="form-group">
                    <label class="control-label" for="firstname">Firstname</label>
                    <input type="text" name="firstname" value="<?php echo isset($model['firstname']) ? $model['firstname'] : '' ?>" class="form-control" />
                </div>

                <div class="form-group">
                    <label class="control-label" for="lastname">Lastname</label>
                    <input type="text" name="lastname" value="<?php echo isset($model['lastname']) ? $model['lastname'] : '' ?>" class="form-control" />
                </div>
                <div class="form-group">
                    <label class="control-label" for="email">Email</label>
                    <input type="email" name="email" value="<?php echo isset($model['email'])?$model['email']:'' ?>" class="form-control" />
                </div>
                <div class="form-group">
                    <label class="control-label" for="password">Password</label>
                    <input type="password" name="password" value="<?php echo isset($model['password'])?$model['password']:'' ?>" class="form-control" />
                </div>
                <div class="row">

                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                    </div>
                    <!-- /.col -->
                </div>
            <?= form_close();  ?>




        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<?= $this->endSection() ?>
