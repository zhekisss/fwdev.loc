<p><a href="/admin/page/new">Новая страница</a></p>
<?= $pageExists ?>

<table class="table table-striped table-bordered">
  <tr>
    <th>
      Название
    </th>
  <th>
    Содержимое
  </th>
  <th>
    Время создания
  </th>
  <th>
    Ссылка
  </th>
  <th>
    Действие
  </th>
  </tr>
<?php foreach ($pages as $page): ?>
  <tr>
    <td>
      <h3><?= $page->title ?></h3>
    </td>
    <td>
      <p class="">
        <?= mb_substr($page->content,0,160, 'UTF-8') ?>...
      </p>
    </td>
    <td>
      <i><?= $page->time ?></i>
    </td>
    <td>
      <i><?= $page->link ?></i>
    </td>
    <td>
      <a href="/<?= ENV ?>/page/delete?id=<?= $page->id ?>">Удалить</a>
      <a href="/<?= ENV . '/page/edit?id=' . $page->id ?>">Редактировать</a>
    </td>
</tr>
<?php endforeach ?>
</table>
