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
                <h1>Bâtir Côté Sud</h1>
                <img src="../../../../wp-includes/images/batir-cote-sud-medium.png">
            </div>
            <h2>Construction - Rénovation</h2>

            <div class="content">
                <h3>
                    Bienvenue dans cet espace dédié à votre projet de construction.<br/>
                    Notre site est en cours d'élaboration.<br/>
                    Pour tout renseignement, vous pouvez nous joindre au 04.66.23.12.92 ou au 07.81.91.78.87.<br/>
                    <br/>
                    Vous pouvez également nous laisser votre adresse email dans l'encart ci-dessous, nous vous
                    recontacterons.
                </h3>

                <p>N'hésitez pas !</p>
            </div>
        </div>
        <?php if (empty($email)) : ?>
            <div class="wuc_icons">
                <form id="send_mail" method="post">
                    <input name="email" class="email" type="text" placeholder="Entrez votre email ..."/>
                    <button type="button" id="btn_email">Send</button>
                </form>
            </div>
            <script>
                function isValidEmailAddress(emailAddress) {
                    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
                    return pattern.test(emailAddress);
                };

                jQuery("#btn_email").click(function (event) {
                    event.preventDefault();
                    var email = jQuery('.email').val();
                    if (isValidEmailAddress(email)) {
                        jQuery.post("wp-content/plugins/wp-construction-mode/library/sendmail.php",
                            {email: email},
                            function (data) {
                                jQuery(".content").html('<h3>' + data + '</h3>');
                                jQuery(".wuc_icons").hide();
                            });
                    }
                });
            </script>
        <?php endif; ?>
    </div>
    <script>
        jQuery('#wuc-box').css({'position': 'relative', 'top': '-800px'});
        jQuery('#wuc-box').animate({'top': '-50px'}, 1500);
    </script>
</div>


</body>
</html>