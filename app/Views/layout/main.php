<!doctype html>
<html lang="en">
    <head>
        <meta charset='utf-8'/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Security-Policy" content="">
        <meta name="google-site-verification" content="9ICnS2AYkX0SthoteX9qZVyJHWqgfmZB2CxDdT5L4gE" />
        <title><?= isset($title)?$title:'Lava Printing'; ?></title>
        <link rel="icon" type="image/png" href="/public/images/Lava-Printing-Favicon.png">
        <?php
        if(isset($metas) && !empty($metas)) {
            foreach ($metas as $meta_key=>$meta_value) {
                echo '<meta name="'.$meta_key.'" content="'.$meta_value.'">';
            }
        }
        ?>
        <?php
        if(isset($ogs) && !empty($ogs)) {
            foreach ($ogs as $og_key=>$og_value) {
                echo '<meta name="'.$og_key.'" content="'.$og_value.'">';
            }
        }
        ?>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--preload style-->
        <link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="preload" as="style" href="/public/assets/css/style.css?v=<?= time(); ?>">
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
        <link rel=" stylesheet" type="text/css" href="/public/assets/css/jquery-simple-mobilemenu.css">
        <link rel="stylesheet" type="text/css" href="/public/assets/css/style.css?v=<?= time(); ?>">
        <link rel=" stylesheet" type="text/css" href="/public/assets/css/responsive.css">
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-S35H4BZBX9"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'G-S35H4BZBX9');
        </script>
        <!--Start of Tawk.to Script-->
            <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/627d3bfbb0d10b6f3e71eda4/1g2sj4kq8';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
            </script>
            <!--End of Tawk.to Script-->
    </head>
    <body class="app wrapper">
        <?php echo $this->include('layout/_header') ?>
        <?= $this->renderSection('content') ?>
        <?php echo $this->include('layout/_footer') ?>
        <script type="text/javascript" src="/public/assets/js/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" async></script>
        <script type="text/javascript" src="/public/assets/bootstrap/js/bootstrap.min.js" async></script>
        <script type="text/javascript" src="/public/assets/slick/slick.min.js"></script>
        <script type="text/javascript" src="/public/assets/js/jquery.zoom.js" defer></script>
        <script type="text/javascript" src="/public/assets/js/jquery.lazy.min.js"></script>
        <script type="text/javascript" src="/public/assets/js/jquery.show-more.js" defer></script>
        <script type="text/javascript" src="/public/assets/js/jquery-simple-mobilemenu.min.js"></script>
        <script type="text/javascript" src="/public/assets/js/custom.js?v=<?= time(); ?>"></script>
        
        
        <script>
    var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?65027';
    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.async = true;
    s.src = url;
    var options = {
  "enabled":true,
  "chatButtonSetting":{
      "backgroundColor":"#4dc247",
      "ctaText":"",
      "borderRadius":"25",
      "marginLeft":"20",
      "marginBottom":"20",
      "marginRight":"0",
      "position":"left"
  },
  "brandSetting":{
      "brandName":"LAVA PRINTING",
      "brandSubTitle":"Typically replies within a day",
      "brandImg":"https://www.lavaprinting.com/public/images/Lava-Printing-Favicon.png",
      "welcomeText":"Hi there!\nHow can I help you?",
      "messageText":"Hello, I have a question about {{page_link}}",
      "backgroundColor":"#0a5f54",
      "ctaText":"Start Chat",
      "borderRadius":"25",
      "autoShow":false,
      "phoneNumber":"+18502528282"
  }
};
    s.onload = function() {
        CreateWhatsappChatWidget(options);
    };
    var x = document.getElementsByTagName('script')[0];
    x.parentNode.insertBefore(s, x);
</script>
<style>
    .wa-chat-box-poweredby {
        display: none;
    }
</style>
    </body>
</html>
