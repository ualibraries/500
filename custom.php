<?php

function theme_favicon() {
    $image = get_theme_option('favicon');
    if ($image) {
        $storage = Zend_Registry::get('storage');
        $uri = $storage->getUri($storage->getPathByType($image, 'theme_uploads'));
        ?>
        <link rel="icon" href="<?php echo $uri; ?>">
        <?php
    }
}

function theme_apple_touch_icon() {
    $image = get_theme_option('apple_touch_icon');
    if ($image) {
        $storage = Zend_Registry::get('storage');
        $uri = $storage->getUri($storage->getPathByType($image, 'theme_uploads'));
        ?>
        <link rel="apple-touch-icon" href="<?php echo $uri; ?>">
        <?php
    }
}

function theme_ms_wide_tile() {
    $image = get_theme_option('ms_wide_tile');
    if ($image) {
        $storage = Zend_Registry::get('storage');
        $uri = $storage->getUri($storage->getPathByType($image, 'theme_uploads'));
        ?>
        <meta name="msapplication-wide558x270logo" content="<?php echo $uri; ?>">
        <?php
    }
}

function theme_ms_square_tile() {
    $image = get_theme_option('ms_square_tile');
    if ($image) {
        $storage = Zend_Registry::get('storage');
        $uri = $storage->getUri($storage->getPathByType($image, 'theme_uploads'));
        ?>
        <meta name="msapplication-square558x558logo" content="<?php echo $uri; ?>">
        <?php
    }
}
