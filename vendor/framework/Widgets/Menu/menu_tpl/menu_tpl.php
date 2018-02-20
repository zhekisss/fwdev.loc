
<li>
        <a href="?id=<?= $category['id'] ?>"><?= $category['title'] ?></a>
        <?php $cat = $category;?>
        <?php if (isset($category['children'])) : ?>
        <ul class="submenu">
            
            <?php $child = $category['children']?>
            <?= $this->getMenuHtml($category['children']) ?>

        </ul>
        <?php endif ?>
</li>
    
