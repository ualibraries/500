<?php
$title = metadata('item', 'display_title');
echo head(array('title' => $title, 'bodyclass' => 'items show'));
?>

<h1 class="item-title"><?php echo metadata('item', 'display_title'); ?></h1>
<div class="item-details">

    <?php
    // If this is a 'Book Reader Item" item type, show the UV player
    if (metadata('item', 'item_type_name') == "Book Reader Item") {
        echo $this->universalViewer($item, array(
            'class' => 'universal-viewer',
            'config' => web_path_to('universal-viewer/config.json'),
        ));
    }
    ?>

    <?php
    if (metadata('item', 'item_type_name') == "Sound" && function_exists('soundcloud_render')) {
        // Check the Item to see if it's configured for Soundcloud
        $relation = metadata('item', array('Dublin Core', 'Relation'));
        $item_type = metadata('item', 'item_type_name');
        echo soundcloud_render($relation, $item_type);
    }
    ?>

    <?php
    // If this is a 'Book Reader Item" item type, don't show the files associated with the item
    if (metadata('item', 'item_type_name') != "Book Reader Item"): ?>
        <?php
        // The following returns all of the files associated with an item.
        if (metadata('item', 'has files')): ?>
            <div id="itemfiles" class="element item-files-list">
                <h3><?php echo __('Files'); ?></h3>
                <?php
                set_loop_records('files', $item->Files);
                foreach (loop('files') as $file):
                    $file_title = metadata($file, array('Dublin Core', 'Title'));
                    $file_date = metadata($file, array('Dublin Core', 'Date'));
                    $file_link_to_original = metadata($file, 'uri');
                    $file_fullsize_image = metadata($file, 'fullsize_uri');
                    $file_alt = '';

                    if ($file_title) {
                        $file_alt = $file_title;

                        if ($file_date) {
                            $file_alt .= ', ' . $file_date;
                        }
                    }
                    ?>
                    <div class="item-file">
                        <div class="item-file-inner">
                            <a href="<?php print $file_link_to_original; ?>" class="item-file-link">
                                <img src="<?php print $file_fullsize_image; ?>" alt="<?php print $file_alt; ?>" />
                            </a>
                            <p class="item-file-caption">
                                <?php echo $file_title; ?>
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
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="item-meta">
        <?php echo all_element_texts('item', ['show_element_set_headings' => false]); ?>

        <?php
        // If the item belongs to a collection, the following creates a link to that collection.
        if (metadata('item', 'Collection Name')): ?>
            <div id="collection" class="element">
                <h3><?php echo __('Collection'); ?></h3>
                <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
            </div>
        <?php endif; ?>

        <?php
        // The following prints a list of all tags associated with the item
        if (metadata('item', 'has tags')): ?>
            <div id="item-tags" class="element">
                <h3><?php echo __('Tags'); ?></h3>
                <div class="element-text"><?php echo tag_string('item'); ?></div>
            </div>
        <?php endif;?>

        <?php // The following prints a citation for this item. ?>
        <div id="item-citation" class="element">
            <h3><?php echo __('Citation'); ?></h3>
            <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
        </div>

        <div id="item-output-formats" class="item-output-formats element">
            <h3><?php echo __('Output Formats'); ?></h3>
            <div class="element-text"><?php echo output_format_list(); ?></div>
        </div>

        <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>

    </div><!--.item-meta -->

</div><!-- .item-details -->

<?php echo foot(); ?>
