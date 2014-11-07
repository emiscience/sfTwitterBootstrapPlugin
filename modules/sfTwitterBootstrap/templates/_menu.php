<?php
use_helper('I18N');
/** @var Array of menu items */ $items = $sf_data->getRaw('items');
/** @var Array of categories, each containing an array of menu items and settings */ $categories = $sf_data->getRaw('categories');
?>

<?php if (count($items)): ?>
    <ul class="nav">
        <?php if (sfTwitterBootstrap::hasItemsMenu($items)): ?>
            <li class="dropdown" data-dropdown="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    Menu
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                   <?php include_partial('sfTwitterBootstrap/menu_list', array('items' => $items, 'items_in_menu' => true)); ?>
                </ul>
            </li>
        <?php endif; ?>
        <?php include_partial('sfTwitterBootstrap/menu_list', array('items' => $items, 'items_in_menu' => false)); ?>
    </ul>
<?php endif; ?>

<?php if (count($categories)): ?>
    <ul class="nav navbar-nav">

        <?php foreach ($categories as $name => $category): ?>
            <?php if (sfTwitterBootstrap::hasPermission($category, $sf_user)): ?>

                <?php if (isset($category['url'])) : ?>
                    <li>
                        <a href="<?php echo url_for($category['url']); ?>">
                        <?php echo __(isset($category['name']) ? $category['name'] : $name) ?>
                        </a>
                    </li>
                <?php else : ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php echo __(isset($category['name']) ? $category['name'] : $name) ?>
                            <span class="caret"></span>
                        </a>
                        <?php if (isset($category['items']) && sfTwitterBootstrap::hasItemsMenu($category['items'])): ?>
                        <ul class="dropdown-menu" role="menu">
                            <?php include_partial('sfTwitterBootstrap/menu_list', array('items' => $category['items'], 'items_in_menu' => true)) ?>
                        </ul>
                        <?php endif; ?>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php foreach ($categories as $name => $category): ?>
            <?php if (isset($category['items'])): ?>
                <?php include_partial('sfTwitterBootstrap/menu_list', array('items' => $category['items'], 'items_in_menu' => false)) ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
<?php elseif (!count($items)): ?>
    <?php echo __('sfTwitterBootstrap is not configured.'); ?>
<?php endif;
