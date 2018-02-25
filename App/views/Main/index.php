<h1>TEST</h1>

<button class="btn" id="send" type="submit">Кнопка</button>

<?php foreach ($posts as $post): ?>
  <h1><?=  $post['name']; ?></h1>
  <p><?=  $post['time']; ?></p>
  <div class="panel-body">
    <?=  $post['content']; ?>
  </div>
<?php endforeach; ?>

<script src="js/main.js" ></script>
<script src="js/script.js" ></script>