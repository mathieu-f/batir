<?php
/*
 * Short description
 * @author bilal hassan <info@smartcatdesign.net>
 * 
 */
?>
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
<!--<div class='overlay'></div>-->
<div id="wuc-wrapper">

    <div class="wuc-logo center">
        <?php if ($wuc_logo != "") { ?>
            <img src="<?php echo $wuc_logo; ?>" width="200px"/>
        <?php } ?>
    </div>
    <div id="wuc-box">
        <div class="center">
            <h2 class="title">
                <?php echo $set_msg; ?>
            </h2>

            <h3 class="subtitle">
                <?php echo $set_caption; ?>
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
            <?php if ($wuc_email != '') { ?>
                <a href="mailto:<?php echo $wuc_email; ?>" target="_blank">
                    <img src="<?php echo plugins_url() ?>/wp-construction-mode/images/email.png"/>
                </a>
            <?php } ?>
        </div>
    </div>
</div>


