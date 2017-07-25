<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
    ?>
    <div class="exhibit-page-contents">

        <?php
        // Display the exhibit homepage image (set as a theme option)
        $current_slug = get_current_record('exhibit_page', false)->slug;
        if ($current_slug === get_theme_option('homepage_slug')):
        ?>
            <div class="exhibit-homepage-image">
                <?php
                $homepage_image = get_theme_option('homepage_image');
                if ($homepage_image) {
                    $storage = Zend_Registry::get('storage');
                    $uri = $storage->getUri($storage->getPathByType($homepage_image, 'theme_uploads'));
                    echo '<img src="' . $uri . '" alt="' . option('site_title') . '" />';
                }
                ?>
            </div>
        <?php endif; ?>

        <h1 class="exhibit-page-title"><?php echo metadata('exhibit_page', 'title'); ?></h1>

        <div class="exhibit-blocks">
            <?php exhibit_builder_render_exhibit_page(); ?>
        </div>

        <div class="exhibit-page-navigation">
            <?php if ($prevLink = exhibit_builder_link_to_previous_page()): ?>
                <div class="exhibit-nav-prev">
                    <div class="exhibit-nav-prev-inner">
                        <?php echo $prevLink; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($nextLink = exhibit_builder_link_to_next_page()): ?>
                <div class="exhibit-nav-next">
                    <div class="exhibit-nav-next-inner">
                        <?php echo $nextLink; ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="exhibit-nav-up">
                <?php echo exhibit_builder_page_trail(); ?>
            </div>
        </div>

    </div>

    <?php echo foot(); ?>
