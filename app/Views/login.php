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
        <h3 class="mb-4">Login</h3>
    </div>
    <!-- /.login-logo -->

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg mb-2">Sign in to start your session</p>
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
            $url = base_url() . '/login';
            $attributes = ['class' => 'form', 'id' => 'login-froms'];
            ?>
            <?= form_open($url,$attributes) ?>
                
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <!--                    <div class="icheck-primary">
                                                <input type="checkbox" id="remember">
                                                <label for="remember">
                                                    Remember Me
                                                </label>
                                            </div>-->
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>

                    <div class="col-12 text-right mt-3">
                        <a href="<?php echo base_url() . '/forget-password'; ?>">Forgot Password?</a>
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
