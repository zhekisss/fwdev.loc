<h1>TEST</h1>
<?php foreach ($posts as $post): ?>


  <h1><?=  $post->name; ?></h1>
  <p><?=  $post['time']; ?></p>
  <div class="panel-body">
    <?=  $post['content']; ?>
  </div>


<?php endforeach; ?>

<?= $sidebar ?>