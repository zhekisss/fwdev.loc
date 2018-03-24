<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/dashboard/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/dashboard/css/style.css">
  
  <title>Main</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <header>

        <h3>MAIN</h3>
        
        <a href="/">Сайт</a>
        <a href="/admin/page/">Страницы</a>
        <a href="/admin/logout/">Выход</a>
        
      </header>
    </div>
  </div>

<div class="container">
  <div class="row">
  
    <?= $content ?>

  </div>
</div>

<div class="container">
  <div class="row">
    <footer>
      <h1>Footer</h1>
    </footer>
  </div>
</div>

</body>

</html>