<div class="content-wrapper">
    <div class="container-fluid">
        <br>
        <br>
        <div class="card mb-3">
            <div class="card-header"><?= $title ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <?php if (empty($vars['cars'])): ?>
                            <p>Список постов пуст</p>
                        <?php else: ?>
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <th>Модель</th>
                                    <th>Марка</th>
                                    <th>Дата выпуска</th>
                                    <th>Пробег</th>
                                    <th>Разгон до 100 км.ч</th>
                                    <th>Л.с.</th>
                                    <th>Цена за сутки</th>
                                    <th>Фото</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <?php foreach ($vars['cars'] as $key => $car): ?>
                                    <tr>
                                        <td><?=++$key?></td>
                                        <td><?=$car['model']?></td>
                                        <td><?=$car['brand']?></td>
                                        <td><?=$car['production_date']?></td>
                                        <td><?=$car['mileage']?></td>
                                        <td><?=$car['overclocking']?></td>
                                        <td><?=$car['horse_power']?></td>
                                        <td><?=$car['price']?></td>
                                        <td><?=$car['img']?></td>
                                        <td><a href="/admin/car/<?= $car['id']; ?>" class="btn btn-primary">Редактировать</a></td>
                                        <td><a href="/admin/car/<?= $car['id']; ?>/delete" class="btn btn-danger">Удалить</a></td>
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