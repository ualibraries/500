<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
    ?>
    <div class="exhibit-page-contents">
        <h1><span class="exhibit-page"><?php echo metadata('exhibit_page', 'title'); ?></span></h1>

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
