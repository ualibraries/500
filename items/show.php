<?php
$title = metadata('item', 'display_title');
echo head(array('title' => $title, 'bodyclass' => 'items show'));
?>

<h1 class="item-title"><?php echo metadata('item', 'display_title'); ?></h1>
<div class="item-details">

    <!-- If this is a 'Book Reader Item" item type, show the UV player -->
    <?php
    if (metadata('item', 'item_type_name') == "Book Reader Item"){
        echo $this->universalViewer($item, array(
            'class' => 'my-class',
            'config' => web_path_to('universal-viewer/config.json'),
        ));
    }
    ?>

    <!-- If this is a 'Book Reader Item" item type, don't show the files associated with the item -->
    <?php if (metadata('item', 'item_type_name') != "Book Reader Item"): ?>
        <!-- The following returns all of the files associated with an item. -->
        <?php if (metadata('item', 'has files')): ?>
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
                        <div class="file-link">
                            <a href="<?php print $file_link_to_original; ?>">
                                <img src="<?php print $file_fullsize_image; ?>" alt="<?php print $file_alt; ?>" />
                            </a>
                            <p class="file-caption"><?php echo $file_title; ?></p>
                            <div class="all-metadata">
                                <div id="text-metadata">
                                    <?php echo all_element_texts($file, ['show_element_set_headings' => false]); ?>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php echo all_element_texts('item', ['show_element_set_headings' => false]); ?>

    <!-- If the item belongs to a collection, the following creates a link to that collection. -->
    <?php if (metadata('item', 'Collection Name')): ?>
        <div id="collection" class="element">
            <h3><?php echo __('Collection'); ?></h3>
            <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
        </div>
    <?php endif; ?>

    <!-- The following prints a list of all tags associated with the item -->
    <?php if (metadata('item', 'has tags')): ?>
        <div id="item-tags" class="element">
            <h3><?php echo __('Tags'); ?></h3>
            <div class="element-text"><?php echo tag_string('item'); ?></div>
        </div>
    <?php endif;?>

    <!-- The following prints a citation for this item. -->
    <div id="item-citation" class="element">
        <h3><?php echo __('Citation'); ?></h3>
        <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
    </div>

    <div id="item-output-formats" class="element">
        <h3><?php echo __('Output Formats'); ?></h3>
        <div class="element-text"><?php echo output_format_list(); ?></div>
    </div>

    <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>

    <nav>
        <ul class="item-pagination navigation">
            <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
            <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
        </ul>
    </nav>
</div><!-- .item-details -->

<?php echo foot(); ?>
