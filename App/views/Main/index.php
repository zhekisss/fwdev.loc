<h1>TEST</h1>

<button class="btn" id="send" type="submit">Кнопка</button>

<!-- <?php //foreach ($posts as $post): ?> -->


  <h1><?=  $posts->name; ?></h1>
  <p><?=  $posts['time']; ?></p>
  <div class="panel-body">
    <?=  $posts['content']; ?>
  </div>


<!-- <?php //endforeach; ?> -->

<?= $sidebar ?>

<script src="js/main.js" ></script>