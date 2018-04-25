<form action="save" method="POST">
  <input type="text" hidden name="id" value="<?= $page->id ?? null ?>"/>
  <input type="text" hidden name="action" value="<?= $action ?? null ?>"/>
  <p><input type="text" name="title" value="<?= $page->title ?? null; ?>"></p>
  <p><input type="text" name="time" value="<?= $page->time ?? null; ?>"></p>
  <p><textarea class="z-depth-3 materialize-textarea" name="content" cols="150" rows="25"><?= $page->content ?? null; ?></textarea></p>
  <p><input type="text" name="category" value="<?= $page->category ?? null; ?>"></p>
  <p><input class="btn" type="submit" value="Сохранить"/></p>
</form>
