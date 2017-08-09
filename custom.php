<?php
/**
* Custom theme functions
*/

/**
* Generates a link for the theme favicon
* @return String link tag for theme favicon
*/
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

/**
* Generates an Apple Touch Icon link
* @return String link tag for theme apple-touch-icon
*/
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

/**
* Generates a link for the theme ms wide tile
* @return String link tag for theme ms wide tile
*/
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

/**
* Generates a link for the theme ms square tile
* @return String link tag for theme ms square tile
*/
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

/**
* Generates the item's files
* @param  Object $item the item
* @return String list of files
*/
function theme_item_files($item, $filetypes = 'images') {
    if (metadata('item', 'has files')): ?>
    <div id="itemfiles" class="element item-files-list">
        <h3><?php echo __('Files'); ?></h3>
        <?php
        // Loop through the files
        set_loop_records('files', $item->Files);
        foreach (loop('files') as $file) {
            if ($filetypes == 'image') {
                theme_item_single_image($file);
            }

            if ($filetypes == 'pdf' && $file->mime_type == 'application/pdf') {
                theme_item_single_pdf($file);
            }
        }
        ?>
    </div>
    <?php endif;
}

function theme_item_single_image($file) {
    ?>
    <div class="item-file">
        <div class="item-file-inner">
            <a href="<?php echo metadata($file, 'uri'); ?>" class="item-file-link">
                <img src="<?php echo metadata($file, 'fullsize_uri'); ?>" alt="<?php echo metadata($file, array('Dublin Core', 'Title')) ?>" />
            </a>
            <p class="item-file-caption">
                <?php echo metadata($file, array('Dublin Core', 'Title')); ?>
            </p>
            <?php if (all_element_texts($file)): ?>
                <button class="item-file-all-metadata-toggle">
                    Details
                </button>
                <div class="item-file-all-metadata">
                    <div id="text-metadata">
                        <?php echo all_element_texts($file, ['show_element_set_headings' => false]); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
}

function theme_item_single_pdf($file) {
    ?>
    <div class="item-file">
        <div class="item-file-inner">
            <a href="<?php echo metadata($file, 'uri'); ?>" class="item-file-link">
                <?php if (metadata($file, array('Dublin Core', 'Title'))): ?>
                    <?php echo metadata($file, array('Dublin Core', 'Title')); ?>
                <?php else: ?>
                    PDF
                <?php endif; ?>
            </a>
        </div>
    </div>
    <?php
}
