<div class="content-wrapper" style="margin: 0 !important;">
    <div class="container-fluid">
        <br>
        <br>
        <div class="card mb-3">
            <div class="card-header"><?= $title ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <?php if (empty($vars['user'])): ?>
                            <p>Список пользователей пуст</p>
                        <?php else: ?>
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <th>Номер телефона</th>
                                    <th>Кол-во заказов</th>


                                </tr>
                                <?php foreach ($vars['user'] as $key => $user): ?>
                                    <tr>
                                        <td><?=++$key?></td>
                                        <td style="text-wrap: nowrap;"><?=$user['phone_number']?></td>
                                        <td><?=$user['orders_count']?></td>
                                        <td><a href="/admin/user/<?= $user['id']; ?>/delete" class="btn btn-danger">Удалить</a></td>
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