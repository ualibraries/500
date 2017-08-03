<?php
$position = isset($options['file-position'])
          ? html_escape($options['file-position'])
          : 'left';
$size = isset($options['file-size'])
      ? html_escape($options['file-size'])
      : 'fullsize';
$captionPosition = isset($options['captions-position'])
                 ? html_escape($options['captions-position'])
                 : 'center';
?>
<div class="exhibit-items <?php echo $position; ?> <?php echo $size; ?> captions-<?php echo $captionPosition; ?>">
    <?php foreach ($attachments as $attachment): ?>
        <?php if($attachment->getItem()->getItemType()->name === "Timeline Image"): ?>
            <?php
                $fileMarkup = new Omeka_View_Helper_FileMarkup;
                echo $fileMarkup->image_tag($attachment->getFile(), array(), "original");
            ?>
        <?php else: ?>
            <?php echo $this->exhibitAttachment($attachment, array('imageSize' => $size)); ?>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
<?php echo $text; ?>
