<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="/js/main.js"></script>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    
    <title><?= $page->title ?></title>

</head>
<body>
    <div class="container">
        <div class="row">
            <header>
                <ul class="menu-">
                    <li class="menu-item-"><a href="/">Main</a></li>
                    <li class="menu-item-"><a href="/page">Page</a></li>
                    <li class="menu-item-"><a href="/posts">Posts</a></li>
                    <li class="menu-item-"><a href="/posts-new">Posts-new</a></li>
                    <li class="menu-item-"><a href="/contacts">Contacts</a></li>
                </ul>
                <?= $menu ?>
                <h1>MAIN</h1>
                <h3>Header</h3>
            </header>
            <h4>Current view file is "<?= __FILE__; ?>"</h4>
            <div class="content">
                <?= $content; ?>
            </div>
            <footer>
                <h1>FOOTER</h1>
                </footer>
        </div>
    
<?= $this->putScripts(); ?>

</body>
</html>