<?php
$title = metadata('item', 'display_title');
echo head(array('title' => $title, 'bodyclass' => 'items show'));
?>

<h1 class="item-title"><?php echo metadata('item', 'display_title'); ?></h1>
<div class="item-details">

    <?php
    // If this is a 'Book Reader Item' item type, show the UV viewer
    if (metadata('item', 'item_type_name') == 'Book Reader Item') {
        echo $this->universalViewer($item, array(
            'class' => 'universal-viewer',
            'config' => web_path_to('universal-viewer/config.json'),
        ));
    }
    ?>

    <?php
    // If this is a 'Sound Item', display a Soundcloud embed
    if (metadata('item', 'item_type_name') == "Sound" && function_exists('soundcloud_render')) {
        // Check the Item to see if it's configured for Soundcloud
        $relation = metadata('item', array('Dublin Core', 'Relation'));
        $item_type = metadata('item', 'item_type_name');
        echo soundcloud_render($relation, $item_type);
    }
    ?>

    <?php
    // If this is a 'Book Reader Item' item type, don't show the files associated with the item
    if (metadata('item', 'item_type_name') != 'Book Reader Item') {
        theme_item_files($item, 'image');
    } else {
        theme_item_files($item, 'pdf');
    }
    ?>

    <?php // Item meta, (not file meta) ?>
    <div class="item-meta">
        <?php
        echo all_element_texts('item', ['show_element_set_headings' => false]);

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
