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
      queue_css_file('styles');
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

    <div class="exhibit-header row">
        <div class="exhibit-menu col" id="exhibit-menu">
            <button class="exhibit-menu-toggle" id="exhibit-menu-toggle">
                <span class="exhibit-menu-toggle-inner">Menu</span>
            </button>
            <nav class="exhibit-menu-links" id="exhibit-menu-links">
                <button class="exhibit-menu-close" id="exhibit-menu-close">
                    <span class="visuallyhidden">
                        Close
                    </span>
                </button>
                <?php echo exhibit_builder_page_tree(); ?>
            </nav>
        </div>

        <div class="site-title col">
            <?php echo exhibit_builder_link_to_exhibit($exhibit, theme_logo()); ?>
        </div>

        <div class="header-secondary col">
            <a class="header-secondary-link" href="<?php echo url(get_theme_option('header_secondary_link')); ?>"><?php echo get_theme_option('header_secondary_link_text'); ?></a>
        </div>
    </div><!-- .exhibit-header -->


    <article id="content">

        <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
