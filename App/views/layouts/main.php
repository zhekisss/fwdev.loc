<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    
    <title><?php // $title ?></title>

</head>
<body>
    <div class="container">
        <div class="row">
            <header>
                <?= $menu ?>
                <div class="clear"></div>
                <h1>MAIN</h1>
                <h3>Header</h3>
            </header>
            <h4>Current view file is "<?= __FILE__ ?>"</h4>
            <div class="content">
                <?= $content ?>
            </div>
            <footer>
                <h1>FOOTER</h1>
            </footer>
        </div>
    </div>

</body>
</html>