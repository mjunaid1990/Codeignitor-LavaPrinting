<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<style>
    #accordion .card {
        margin-bottom: 15px;
        border: 0;
    }
    #accordion .card-header {
        padding: 0;
        border: 0;
        border-bottom: 0;
    }
    #accordion .card-header a {
        color: rgba(101, 100, 100, 1);
        text-transform: capitalize;
        text-decoration: none;
        font-size: 20px;
        cursor: pointer;
        background-color: #f0f0f0;
        padding: .75rem 1.25rem;
        font-weight: 400;
    }
    #accordion .card-header a:hover {
        color: #000;
        text-decoration: none;
    }
    #accordion .card-header a:not(.collapsed) {
        background-color: #0780eb;
        color: #fff;
    }
    #accordion .card-header a.collapsed:after {
        font-family: "Font Awesome 5 Free"; 
        font-size: 20px;
        font-weight: 900;
        content: "\f078";
        position: absolute;
        right: 15px;
    }
    #accordion .card-header a:not(.collapsed):after {
        font-family: "Font Awesome 5 Free"; 
        font-size: 20px;
        font-weight: 900;
        content: "\f077";
        position: absolute;
        right: 15px;
    }
</style>

<div class="bodyContent">
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <h2 class="ipt-title">Frequently Asked Questions</h2>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row py-5">
            <div class="col-12">
                <div id="accordion">
                    <?php
                    if($lists) {
                        foreach ($lists as $k=>$list) {
                            ?>
                                <div class="card">
                                  <div class="card-header" id="heading-<?= $k ?>">
                                    <a class="mb-0 d-block collapsed" data-toggle="collapse" data-target="#collapse-<?= $k ?>" aria-expanded="true" aria-controls="collapse-<?= $k ?>">
                                      <?= $list->name ?>
                                    </a>
                                  </div>

                                  <div id="collapse-<?= $k ?>" class="collapse <?= $k==0 ?'':''; ?>" aria-labelledby="heading-<?= $k ?>" data-parent="#accordion">
                                    <div class="card-body">
                                      <?= $list->description; ?>
                                    </div>
                                  </div>
                                </div>
                            <?php
                        }
                    }
                    ?>
                    
                    
                  </div>
                
            </div>
        </div>
    </div>
    
</div>

<?= $this->endSection() ?>