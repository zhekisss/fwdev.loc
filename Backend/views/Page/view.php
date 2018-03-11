<form action="save" method="POST">
<p><input type="text" name="name" value="<?= $page->name ?? null; ?>"></p>
<p><input type="text" name="nime" value="<?= $page->time ?? null; ?>"></p>
<p><textarea name="content" id="" cols="150" rows="10"><?= $page->content ?? null; ?></textarea></p>
<p><input type="text" name="category" value="<?= $page->category ?? null; ?>"></p>
<p><input type="submit"></p>
</form>