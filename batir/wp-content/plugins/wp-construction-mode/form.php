<style>
    .left{ float: left;}
    .right {float: right;}
    .center{text-align: center;}
    .width70{ width: 70%;}
    .width25{ width: 25%;}
	.width50{ width: 50%;}
    #gopro{
        width: 100%;
        display: block;
        clear: both;
        padding: 10px;
        margin: 10px 8px 15px 5px;
        border: 1px solid #e1e1e1;
        background: #464646;
        color: #ffffff;
        overflow: hidden;
    }
    #wrapper{
        border: 1px solid #f0f0f0;
        width: 95%;

    }
    #wrapper{
        border: 1px solid #f0f0f0;
        width: 95%;

    }
    table.widefat{
        margin-bottom: 15px;
    }
    table.widefat tr{
        transition: 0.3s all ease-in-out;
        -moz-transition: 0.3s all ease-in-out;
        -webkit-transition: 0.3s all ease-in-out;
    }
    table.widefat tr:hover{
        /*background: #E6E6E6;*/
    }    

    #wrapper input[type='text']{
        width: 80%;
        transition: 0.3s all ease-in-out;
        -moz-transition: 0.3s all ease-in-out;
        -webkit-transition: 0.3s all ease-in-out;
    }
    #wrapper input[type='text']:focus{
        border: 1px solid #1784c9;
        box-shadow: 0 0 7px #1784c9;
        -moz-box-shadow: 0 0 5px #1784c9;
        -webkit-box-shadow: 0 0 5px #1784c9;
    }
    #wrapper input[type='text'].small-text{
        width: 20%;
    }
    .proversion{
        color: red;
        font-style: italic;
    }
</style>

<div id="wrapper">
    <div id="gopro">
        <div class="left">
            <h1><b>WP Construction / Maintenance Mode</b></h1>
            <div><em>Why go pro?</em> More Icons, More Colors, Animations and more!  </div>
        </div>
        <div class="right">
            <a href="http://smartcatdesign.net/wp-construction-mode-pro-wordpress-plugin/" target="_blank" class="button-primary" style="padding: 40px;line-height: 0;font-size: 20px">GO PRO NOW</a>
        </div>
    </div>

    <div class="width25 right">
        <table class="widefat">
            <thead>
                <tr>
                    <th><?php _e("Support") ?></th>
                </tr>
                <tr>
                    <td>
                        <?php
                        _e("Do you have any questions ? Do you need any help ? Let us know on our website!");
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class='center'>
                        <a href='http://smartcatdesign.net/under-construction-maintenance-mode-free-wordpress-plugin/' target='_blank' class='button-primary'>Support</a>
                    </td>
                </tr>
            </thead>
        </table>
        <table class="widefat">
            <thead>
                <tr>
                    <th><?php _e("Pro Version") ?> <span class='proversion'></span></th>
                </tr>
                <tr>
                    <td>
                        <?php
                        _e("With the pro version, you get the ability to add cool animations, and additional icons for Instagram, Digg, Flickr, Skype, Tumblr and Youtube");
                        ?>
                    </td>
                </tr>
            </thead>
        </table>
    </div>
    <div class="width70 left">
        <form name="post_form" method="post" action="" enctype="multipart/form-data">
            <table class="widefat">
                <thead>
                    <tr>
                        <th colspan="2">Appearance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php _e('Set Under Construction') ?></td>
                        <td>
                            <select name="set_opt" id="set_opt">
                                <option value="No" <?php echo ($set_opt == 'No') ? 'selected=selected' : ''; ?>>No</option>
                                <option value="Yes" <?php echo ($set_opt == 'Yes') ? 'selected=selected' : ''; ?>>Yes</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><?php _e('Set To Specific Page') ?></td>
                        <td>
                            <select name="set_page" id="set_page">
                                <option value="all"><?php _e('Entire Website') ?></option>
                                <?php
                                $pages = get_pages();
                                foreach ($pages as $page) {
                                    $option = "<option value= '" . $page->ID . "'";
                                    if (get_option("set_page") == $page->ID)
                                        $option .= "selected";
                                    $option .= ">";
                                    $option .= $page->post_title;
                                    $option .= '</option>';
                                    echo $option;
                                }
                                ?>

                            </select>    
                        </td>
                    <tr>
                        <td><?php _e('Logo') ?></td>
                        <td>
                            <input type="text" name="wuc_logo" value="<?php echo $wuc_logo ?>" placeholder="<?php _e('Enter image path/url or leave blank for no logo'); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td><?php _e('Title') ?></td>
                        <td>
                            <textarea name="set_msg" id="set_msg" cols="20" rows="3" style="width: 50%"><?php echo $set_msg; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><?php _e('Caption') ?></td>
                        <td>
                            <textarea name="set_caption" id="set_caption" cols="20" rows="3" style="width: 50%"><?php echo $set_caption; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><?php _e('Loading Animation')?></td>
                        <td>
                            <select name='wuc_load_animate'>
                                <option value='no'>None</option>
                                <option value='yes' disabled>Fade In - Pro Version</option>
                                <option value='yes' disabled>Slide In - Pro Version</option>
                            </select>
                            <span class='proversion'>Pro Version</span>
                        </td>
                    </tr>                    
                </tbody>
            </table>
            <table class="widefat">
                <thead>
                    <tr>
                        <th colspan="2">Social Icons</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php _e('Facebook URL')?></td>
                        <td>
                            <input type="text" name="wuc_facebook" value="<?php echo $wuc_facebook ?>" placeholder="<?php _e('Enter Facebook URL or leave blank for no icon'); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td><?php _e('Google Plus URL')?></td>
                        <td>
                            <input type="text" name="wuc_gplus" value="<?php echo $wuc_gplus ?>" placeholder="<?php _e('Enter Google Plus URL or leave blank for no icon'); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td><?php _e('Twitter URL')?></td>
                        <td>
                            <input type="text" name="wuc_twitter" value="<?php echo $wuc_twitter ?>" placeholder="<?php _e('Enter Twitter URL or leave blank for no icon'); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td><?php _e('Email Address')?></td>
                        <td>
                            <input type="text" name="wuc_email" value="<?php echo $wuc_email ?>" placeholder="<?php _e('Enter email address or leave blank for no icon'); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td><?php _e('Hover Animation')?></td>
                        <td>
                            <select name='wuc_social_animate'>
                                <option value='no'>No</option>
                                <option value='yes' disabled>Yes - Pro Version</option>
                            </select>
                            <span class='proversion'>Pro Version</span>
                        </td>
                    </tr>
                    <tr>
                        <td><?php _e('Instagram')?></td>
                        <td>
                            <input type="text" name="#" placeholder="<?php _e('Enter Instagram URL or leave blank for no icon'); ?>" disabled/><span class='proversion'>Pro Version</span>
                        </td>
                    </tr>                    
                    <tr>
                        <td><?php _e('Digg')?></td>
                        <td>
                            <input type="text" placeholder="<?php _e('Enter Digg URL or leave blank for no icon'); ?>" disabled/><span class='proversion'>Pro Version</span>
                        </td>
                    </tr>                    
                    <tr>
                        <td><?php _e('Flickr')?></td>
                        <td>
                            <input type="text" placeholder="<?php _e('Enter Flickr URL or leave blank for no icon'); ?>" disabled/><span class='proversion'>Pro Version</span>
                        </td>
                    </tr>                    
                    <tr>
                        <td><?php _e('Skype')?></td>
                        <td>
                            <input type="text" placeholder="<?php _e('Enter Skype URL or leave blank for no icon'); ?>" disabled/><span class='proversion'>Pro Version</span>
                        </td>
                    </tr>                    
                    <tr>
                        <td><?php _e('Tumblr')?></td>
                        <td>
                            <input type="text" placeholder="<?php _e('Enter Tumblr URL or leave blank for no icon'); ?>" disabled/><span class='proversion'>Pro Version</span>
                        </td>
                    </tr>                    
                    <tr>
                        <td><?php _e('Youtube')?></td>
                        <td>
                            <input type="text" placeholder="<?php _e('Enter Youtube URL or leave blank for no icon'); ?>" disabled/><span class='proversion'>Pro Version</span>
                        </td>
                    </tr>                    
                </tbody>
            </table>
            <input type="submit" name="submit" value="Update" class="button button-primary" />
            <input type="hidden" name="act" value="save" />
        </form>

    </div>
    <!--        <div class="alignleft" style="width: 30%;background:#edeae6 ">
            <h2 style="color: #B0CB1F;background: #414141;text-align: center;padding: 10px 0;margin-top: 10px;">Plugin Details</h2>
            <p style="text-align: center;padding: 10px">
    <?php _e("Use this plugin to set your entire website or specific pages offline for anyone who is not an admin.") ?>
                <br>
    <?php _e("This is perfect for building a site on a live domain, or if you want to make changes on a page on a live site, you can set the specific page offline") ?>
                <br>
    <?php _e("Set your own custom message. Future updates will allow for more customization. To request specific changes, please visit my website and submit your feedback") ?>
            </p>
            <p style="text-align: center">
                <a href="http://smartcatdesign.net/under-construction-maintenance-mode-free-wordpress-plugin/" target="_blank" class="button button-primary">Plugin Site</a>
            </p>
            <p style='text-align: center'>
                <img src='http://smartcatdesign.net/wp-content/uploads/2013/03/logo-medium.png' style="max-width: 100%"/>
            </p>
        </div> 
    </div>-->