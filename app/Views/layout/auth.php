<!doctype html>
<html lang="en">
    <head>
        <meta charset='utf-8'/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Security-Policy" content="">
        <title>Lavaprinting</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--FONTAWESOME ICON-->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <!-----SITE  FONTS---->
        <link rel=" stylesheet" type="text/css" href="/public/assets/fonts/poppins/stylesheet.css">
        <link rel=" stylesheet" type="text/css" href="/public/assets/fonts/circularstd/style.css">
        <!---BOOTSTRAP-4  ---->
        <link rel=" stylesheet" type="text/css" href="/public/assets/bootstrap/css/bootstrap.min.css">
        <!---SLICK SLIDER ---->
        <link rel=" stylesheet" type="text/css" href="/public/assets/slick/slick-theme.css">
        <link rel=" stylesheet" type="text/css" href="/public/assets/slick/slick.css">
        <!---SITE STYLE ------>
        <link rel=" stylesheet" type="text/css" href="/public/assets/css/style.css?v=<?= time(); ?>">
        <link rel=" stylesheet" type="text/css" href="/public/assets/css/responsive.css">
    </head>
    <body class="app wrapper">
        <?= $this->renderSection('content') ?>
        <script type="text/javascript" src="/public/assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="/public/assets/slick/slick.min.js"></script>
        <script type="text/javascript" src="/public/assets/js/custom.js"></script>
    </body>
</html>
