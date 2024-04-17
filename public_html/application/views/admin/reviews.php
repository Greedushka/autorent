<div class="content-wrapper" style="margin: 0 !important;">
    <div class="container-fluid">
        <br>
        <br>
        <div class="card mb-3">
            <div class="card-header"><?= $title ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <?php if (empty($vars['reviews'])): ?>
                            <p>Список отзывов пуст</p>
                        <?php else: ?>
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <th>Количество звёзд</th>
                                    <th>Текст сообщения</th>


                                </tr>
                                <?php foreach ($vars['reviews'] as $key => $review): ?>
                                    <tr>
                                        <td><?=++$key?></td>
                                        <td><?=$review['stars_count']?></td>
                                        <td><?=$review['description']?></td>
                                        <td><a href="/admin/reviews/<?= $review['id']; ?>/delete" class="btn btn-danger">Удалить</a></td>
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