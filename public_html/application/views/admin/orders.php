<div class="content-wrapper" style="margin: 0 !important;">
    <div class="container-fluid">
        <br>
        <br>
        <div class="card mb-3">
            <div class="card-header"><?= $title ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <?php if (empty($vars['orders'])): ?>
                            <p>Список заказов пуст</p>
                        <?php else: ?>
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <th>Дата заказа</th>
                                    <th>Цена</th>


                                </tr>
                                <?php foreach ($vars['orders'] as $key => $order): ?>
                                    <tr>
                                        <td><?=++$key?></td>
                                        <td><?=$order['date']?></td>
                                        <td><?=$order['price']?></td>

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