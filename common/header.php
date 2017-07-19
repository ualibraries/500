<!doctype html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Stylesheets -->
    <?php
      echo head_css();
    ?>

    <!-- JavaScripts -->
    <?php
      queue_js_file('bundle');
      echo head_js();
    ?>
</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>

    <header role="banner">
        <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
    </header>

    <div class="exhibit-header">
        <div class="menu">
            <button class="menu-button" id="open-button">Menu</button>
            <div class="menu-wrap">
                <nav class="exhibit-pages">
                    <?php echo exhibit_builder_page_tree(); ?>
                </nav>
                <button class="close-button" id="close-button">Close</button>
            </div>
        </div>

        <div class="site-title">
            <?php echo exhibit_builder_link_to_exhibit($exhibit, theme_logo()); ?>
        </div>

        <a class="header-secondary-link" href="<?php echo url(get_theme_option('header_secondary_link')); ?>"><?php echo get_theme_option('header_secondary_link_text'); ?></a>

    </div>


    <article id="content">

        <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
