<div class="content-wrapper">
    <div class="container-fluid">
        <br>
        <br>
        <div class="card mb-3">
            <div class="card-header"><?= $title ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <?php if (empty($vars['posts'])): ?>
                            <p>Список постов пуст</p>
                        <?php else: ?>
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <th>Титульник</th>
                                    <th>Описание</th>


                                </tr>
                                <?php foreach ($vars['posts'] as $key => $post): ?>
                                    <tr>
                                        <td><?=++$key?></td>
                                        <td><?=$post['title']?></td>
                                        <td style="max-width: 250px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?=$post['description']?></td>
                                        <td><a href="/admin/post/<?= $post['id']; ?>" class="btn btn-primary">Редактировать</a></td>
                                        <td><a href="/admin/post/<?= $post['id']; ?>/delete" class="btn btn-danger">Удалить</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>