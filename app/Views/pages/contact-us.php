<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>



<div class="bodyContent">
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <h2 class="ipt-title">Contact Us</h2>
                </div>
            </div>
        </div>
    </div>
    <section class="writeMsg">
        <div class="container">
            <div class="row py-5">
                <div class="col-12 col-md-6">
                    <div class="myHeading">
                        <h2>You Can Write Us</h2>
                    </div>
                    <div class="quoitMsg">
                        <?php
                        $attributes = ['id' => 'contact-form'];
                        echo form_open('/contact-message', $attributes);
                        ?>
                        <div class="twoFields">
                            <input type="text" name="name" placeholder="name" id="name" required="">
                            <input type="email" name="email" placeholder="email" id="email" required="">
                        </div>
                        <div class="twoFields">
                            <input type="text" name="phone" placeholder="phone" id="phone" required="">
                            <input type="text" name="subject" placeholder="subject" id="subject" required="">
                        </div>
                        <div class="commentBox">
                            <textarea name="messageBox" id="messageBox" placeholder="Message" required=""></textarea>
                        </div>
                        <input type="submit" name="submitmsg" id="submitmsg" value="Send Message">
                        <div class="message"></div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?= $this->endSection() ?>