<h1>PAGE</h1>

<?php foreach ($posts as $post): ?>
  <h1><a href="/page/<?= $post->link ?>"><?=  $post->title; ?></a></h1>
  <h4>Время публикации: <?=  $post->time; ?></h4>
<?php endforeach; ?>