
        <?php $child = ''; ?>
        <?php if (isset($category['children'])) : ?>
        <?php $child = " child "; ?>
        <?php endif ?>
    <li class="menu-item<?= $child ?>">
        <a href="?id=<?= $category['id'] ?>"><?= $category['title'] ?></a>
        <?php if (isset($category['children'])) : ?>
        <ul class="submenu">
            <?= $this->getMenuHtml($category['children']) ?>
        </ul>
        <?php endif ?>
</li>
    
