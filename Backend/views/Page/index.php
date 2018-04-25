<p><a class="z-depth-2 btn cyan darken-1" href="/admin/page/new">Новая страница</a></p>
<?= $pageExists ?>

<table class="table pages table-hover table-bordered">
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
      <h4><?= $page->title ?></h4>
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
      <p><a class="z-depth-2 cyan btn darken-1" href="/<?= ENV ?>/page/delete?id=<?= $page->id ?>">Удалить</a></p>
      <p><a class="z-depth-2 cyan btn darken-1" href="/<?= ENV . '/page/edit?id=' . $page->id ?>">Редактировать</a></p>
    </td>
</tr>
<?php endforeach ?>
</table>
