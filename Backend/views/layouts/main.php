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
    <div class="col m12">
      <header>
          <nav>
            <div class="nav-wrapper grey darken-1">
              <a href="#" class="brand-logo"><?=mb_substr($page->title, 0, 50, 'UTF-8')?>...</a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="z-depth-2 btn cyan darken-1" href="/">Сайт</a></li>
                <li><a class="z-depth-2 btn cyan darken-1" href="/admin/page/">Страницы</a></li>
                <li><a class="z-depth-2 btn cyan darken-1" href="/admin/logout/">Выход</a></li>
                </ul>
            </div>
          </nav>
      </header>
    </div>
  </div>

<div class="container">
  <div class="col m12">

    <?=$content?>

  </div>
</div>

<div class="container">
  <div class="col m12">
    <footer>
      <h1>Footer</h1>
    </footer>
  </div>
</div>

</body>

</html>