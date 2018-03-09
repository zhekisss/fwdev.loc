<p>Вид <?= __FILE__ ?></p>
<p><?= $index; ?></p>
<?php foreach ($pages as $page): ?>
<h3><a href="/<?= ENV . '/page/' .$page->link ?>"><?= $page->name ?></a></h3>
<p><?= $page->content ?></p>
<p><i><?= $page->time ?></i></p>
<p><i><?= $page->link ?></i></p>
<?php endforeach ?>