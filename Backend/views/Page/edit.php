<form action="save" method="POST">
  <input type="text" hidden name="id" value="<?= $page->id ?? null ?>">
  <p><input type="text" name="title" value="<?= $page->title ?? null; ?>"></p>
  <p><input type="text" name="time" value="<?= $page->time ?? null; ?>"></p>
  <p><textarea name="content" cols="150" rows="10"><?= $page->content ?? null; ?></textarea></p>
  <p><input type="text" name="category" value="<?= $page->category ?? null; ?>"></p>
  <p><input type="submit" value="Сохранить"/></p>
</form>
