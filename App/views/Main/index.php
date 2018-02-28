<h1>TEST</h1>

<button class="btn" id="send" type="submit">Кнопка</button>

<?php foreach ($posts as $post): ?>
  <h1><?=  $post['name']; ?></h1>
  <p><?=  $post['time']; ?></p>
  <div class="panel-body">
    <?=  $post['content']; ?>
  </div>
<?php endforeach; ?>

<<<<<<< HEAD
<?= $form ?>
<h2>{{date( 'r' ,time());}}</h2>
=======
{{date('d/m/Y H:i', time())}}

>>>>>>> ed328aa390fa90e16f4bdb2d7249cda1fa2e5dfa
<script src="js/main.js" ></script>
<script src="js/script.js" ></script>