<h1>TEST</h1>

<button class="btn" id="send" type="submit">Кнопка</button>

<?php foreach ($posts as $post): ?>
  <h1><a href="/page/<?= $post->link ?>"><?=  $post['name']; ?></a></h1>
  <p><?=  $post['time']; ?></p>
<?php endforeach; ?>


<h2>{{ date('r',time()) }}</h2>
<script src="js/main.js" ></script>
<script src="js/script.js" ></script>