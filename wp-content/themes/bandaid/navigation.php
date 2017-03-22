<?php
global $smof_data;
if ($smof_data['topbar'] == 1) {
    ?>
    <div class="upper-nav-bar">
        <div class="container">
            <div class="sixteen columns">
                <div id="left-bar-top">
                    <?php if ($smof_data['bar_address']) echo '<div class="bar-item"><i class="fa fa-envelope-o"></i>' . $smof_data['bar_address'] . '</div>'; ?>
                    <?php if ($smof_data['bar_phone']) echo '<div class="bar-item"><i class="fa fa-phone"></i>' . $smof_data['bar_phone'] . '</div>'; ?>
                    <?php if ($smof_data['bar_skype']) echo '<div class="bar-item"><i class="fa fa-skype"></i>' . $smof_data['bar_skype'] . '</div>'; ?>
                </div>
                <div id="super-menu">
                    <?php wp_nav_menu(array('theme_location' => 'super-menu', 'menu_id' => 'country-mega-menu', 'container' => false, 'menu_class' => 'nav')); ?>
                    <?php //ubermenu( 'main',array('theme_location' => 'super-menu', 'menu_id' => 'country-mega-menu', 'container' => false, 'menu_class' => 'nav') ); ?>
                </div><!-- /super-menu -->
                <div id="right-bar-top">
                    <a href="https://us.cloud.im/home/" target="_blank" class="btn btn-outline-gray" role="button">Shop Marketplace</a>
                    <?php if ($smof_data['linkedin_url']) echo '<a href="' . $smof_data['linkedin_url'] . '" class="social" target="_blank"><i class="fa fa-linkedin"></i></a>'; ?>
                    <?php if ($smof_data['twitter_url']) echo '<a href="' . $smof_data['twitter_url'] . '" class="social" target="_blank"><i class="fa fa-twitter"></i></a>'; ?>
                    <?php if ($smof_data['facebook_url']) echo '<a href="' . $smof_data['facebook_url'] . '" class="social" target="_blank"><i class="fa fa-facebook"></i></a>'; ?>
                    <?php if ($smof_data['youtube_url']) echo '<a href="' . $smof_data['youtube_url'] . '" class="social" target="_blank"><i class="fa fa-youtube"></i></a>'; ?>
                    <?php if ($smof_data['google_url']) echo '<a href="' . $smof_data['google_url'] . '" class="social" target="_blank"><i class="fa fa-google-plus"></i></a>'; ?>
                    <?php if ($smof_data['instagram_url']) echo '<a href="' . $smof_data['instagram_url'] . '" class="social" target="_blank"><i class="fa fa-instagram"></i></a>'; ?>
                    <?php if ($smof_data['vimeo_url']) echo '<a href="' . $smof_data['vimeo_url'] . '" class="social" target="_blank"><i class="fa fa-vimeo-square"></i></a>'; ?>
                    <?php if ($smof_data['dribbble_url']) echo '<a href="' . $smof_data['dribbble_url'] . '" class="social" target="_blank"><i class="fa fa-dribbble"></i></a>'; ?>
                    <?php if ($smof_data['rss_url']) echo '<a href="' . $smof_data['rss_url'] . '" class="social" target="_blank"><i class="fa fa-rss"></i></a>'; ?>
                    <?php if ($smof_data['flickr_url']) echo '<a href="' . $smof_data['flickr_url'] . '" class="social" target="_blank"><i class="fa fa-flickr"></i></a>'; ?>
                    <?php if ($smof_data['tumblr_url']) echo '<a href="' . $smof_data['tumblr_url'] . '" class="social" target="_blank"><i class="fa fa-tumblr"></i></a>'; ?>
                    <?php if ($smof_data['pinterest_url']) echo '<a href="' . $smof_data['pinterest_url'] . '" class="social" target="_blank"><i class="fa fa-pinterest"></i></a>'; ?>
                    <?php if ($smof_data['github_url']) echo '<a href="' . $smof_data['github_url'] . '" class="social" target="_blank"><i class="fa fa-github"></i></a>'; ?>
                    <?php if ($smof_data['email_url']) echo '<a href="mailto:' . $smof_data['email_url'] . '" class="social" target="_blank"><i class="fa fa-envelope-o"></i></a>'; ?>
                    <?php if ($smof_data['website_url']) echo '<a href="' . $smof_data['website_url'] . '" class="social" target="_blank"><i class="fa fa-align-justify"></i></a>'; ?>
                    
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<div class="nav-bar sticky">
    <div class="container">
        <div class="three columns" id="mobile">
            <div id="logo">
                <?php if ($smof_data['logo']) { ?> 
                    <a href="<?php echo home_url(); ?>"><img src="<?php echo $smof_data['logo']; ?>" alt="<?php bloginfo('name'); ?>"/></a>
                <?php } else { ?>
                    <h2><?php bloginfo('name'); ?></h2>
                <?php } ?>
            </div>
            <div class="toggle">
                <a href="#menu" class="toggleMenu"><span></span></a></div>
        </div>
        <div id="menu" class="thirteen columns">
            <div class="container-menu fa">
                <?php
                if ($smof_data['onepage'] == 1) {
                    if (has_nav_menu('onepage-menu')) {
                        wp_nav_menu(array('container' => '', 'menu_id' => 'onepage-menu', 'menu_class' => 'nav', 'theme_location' => 'onepage-menu'));
                        ?>
                        <?php
                    } else
                        echo '<a href="' . home_url() . '/wp-admin/nav-menus.php">Configure Menu</a>';
                } else {


                    if (has_nav_menu('primary')) {
                        wp_nav_menu(array('container' => '', 'menu_id' => 'primary-menu', 'menu_class' => 'nav', 'theme_location' => 'primary'));
                    } else
                        echo '<a href="' . home_url() . '/wp-admin/nav-menus.php">Configure Menu</a>';
                    ?>
                    <?php
                }
                ?> 
            </div>
        </div>
    </div>
</div>