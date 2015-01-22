<a href="<?php echo url_for($item['url']) ?>" title="<?php echo __($item['name']); ?>">
    <?php if (isset($item['fa_icon'])) : ?>
        <span class="fa fa-<?php echo $item['fa_icon'] ?>"></span>
    <?php elseif (isset($item['icon'])): ?>
        <span class="glyphicon glyphicon-<?php echo $item['icon'] ?> icon-<?php echo $item['icon'] ?>"></span>
    <?php elseif (isset($item['image'])): ?>
        <?php echo image_tag($item['image'], array('absolute' => true, 'width' => '16', 'height' => '16')); ?>
    <?php endif; ?>
    <span><?php echo __($item['name']); ?></span>
</a>
