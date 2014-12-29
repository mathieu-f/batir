<?php
/*
 * Short description
 * @author bilal hassan <info@smartcatdesign.net>
 * 
 */
?>
<div class='wuc-overlay'>
    <div id="wuc-wrapper">

        <div id="wuc-box">
            <div class="wuc-logo center">
                <?php if ($wuc_logo != "") { ?>
                    <img src="<?php echo $wuc_logo; ?>" width="200px"/>        
                <?php } ?>
            </div>
            <h2 class="title">
                <?php echo $set_msg; ?>
            </h2>
            <h3 class="subtitle">
                <?php echo $set_caption; ?>
            </h3>
            
            <?php if($wuc_loading != 'none'){ ?>
                <div class="wuc-progress">
                    <div class="wuc-progress-bar" style="width: <?php echo $wuc_progress; ?>%"></div>
                    <div class="wuc-progress-number"><?php echo $wuc_progress; ?>% complete</div>
                </div>
            <?php }?>
            
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
            <div id="wuc-footer"></div>
        </div>
    </div>
</div>