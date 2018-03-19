<?php foreach ($pages as $page): ?>
<h3><a href="/<?= ENV . '/page/' . $page->link ?>"><?= $page->title ?></a></h3>
<p><?= $page->content ?></p>
<p><i><?= $page->time ?></i></p>
<p><i><?= $page->link ?></i></p>
<?php endforeach ?>
