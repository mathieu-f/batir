<style>
    #wuc-box .wuc_icons img {
        transition: 0.4s all ease;
        -moz-transition: 0.4s all ease;
        -webkit-transition: 0.4s all ease;
    }

    #wuc-box .wuc_icons img:hover {
        transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -webkit-transform: rotate(360deg);
    }
</style>
<link href="https://fonts.googleapis.com/css?family=Oswald&amp;v1" rel="stylesheet" type="text/css">
</head>
<body>
<!--<div class='overlay'></div>-->
<div id="wuc-wrapper">

    <div class="wuc-logo center">
        <?php if ($wuc_logo != "") { ?>
            <img src="<?php echo $wuc_logo; ?>" width="200px"/>
        <?php } ?>
    </div>
    <div id="wuc-box">
        <div class="center">
            <div class="logo">
                <h1>
                    Bâtir Côté Sud
                </h1>
                <img src="../../../../wp-includes/images/batir-cote-sud-little.png"></div>
            <h2>
                Construction - Rénovation
            </h2>

            <h3>
                Bienvenue dans cet espace dédié à votre projet de construction.<br/>
                Notre site est en cours d'élaboration.<br/>
                Pour tout renseignement vous pouvez nous joindre au 04 66 23 12 92 ou 07 81 91 78 87 ou nous laisser
                votre adresse email ci-dessous, nous vous recontacterons.<br />
                <br />
                N'hésitez pas !
            </h3>
        </div>
        <div class="wuc_icons">
            <?php if ($wuc_facebook != '') { ?>
                <a href="<?php echo $wuc_facebook; ?>" target="_blank">
                    <img src="<?php echo plugins_url() ?>/wp-construction-mode/images/fb.png"/>
                </a>
            <?php } ?>
            <?php if ($wuc_gplus != '') { ?>
                <a href="<?php echo $wuc_gplus; ?>" target="_blank">
                    <img src="<?php echo plugins_url() ?>/wp-construction-mode/images/google.png"/>
                </a>
            <?php } ?>
            <?php if ($wuc_twitter != '') { ?>
                <a href="<?php echo $wuc_twitter; ?>" target="_blank">
                    <img src="<?php echo plugins_url() ?>/wp-construction-mode/images/twitter.png"/>
                </a>
            <?php } ?>
            <?php /*if ($wuc_email != '') { ?>
                <a href="mailto:<?php echo $wuc_email; ?>" target="_blank">
                    <img src="<?php echo plugins_url() ?>/wp-construction-mode/images/email.png"/>
                </a>
            <?php } */
            ?>
            <form action="form.php" method="post">
                <input name="email" class="email" type="text" placeholder="Entrez votre email ..."/>
                <button type="submit" class="btn_email">Send</button>
            </form>
        </div>
    </div>
    <script>
        jQuery('#wuc-box').css({'position': 'relative', 'top': '-800px'});
        jQuery('#wuc-box').animate({'top': '-50px'}, 1500);
    </script>
</div>


</body></html>