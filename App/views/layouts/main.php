<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    
    <title><?= $page->name ?></title>

</head>
<body>
    <div class="container">
        <div class="row">
            <header>
                <h1>MAIN</h1>
                <h3>Header</h3>
            </header>
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