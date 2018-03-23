<?php foreach ($posts as $post): ?>
  <h3><a href="/page/<?= $post->link ?>"><?=  $post->title; ?></a></h3>
  <h4>Время публикации: <?=  $post->time; ?></h4>
  <p><?= mb_substr($post->content,0,160, 'UTF-8'); ?>...</p>
<?php endforeach; ?>