<br>
<br>

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">Добавить промокод</div>
            <div style="padding: 10px;">
                <form action="/admin/promo/add" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Промокод</label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Размер скидки</label>
                        <input type="text" class="form-control" name="sale" id="exampleInputPassword1">
                    </div>

                    <button type="submit" class="btn btn-primary">Добавить</button>
                </form>
            </div>
        </div>


        <div class="card mb-3">
            <div class="card-header"><?= $title ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <?php if (empty($vars['promos'])): ?>
                            <p>Список постов пуст</p>
                        <?php else: ?>
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Скидка</th>
                                    <th>Кол-во использований</th>
                                    <th></th>
                                </tr>
                                <?php foreach ($vars['promos'] as $key => $promo): ?>
                                    <tr>
                                        <td><?=++$key?></td>
                                        <td><?=$promo['name']?></td>
                                        <td><?=$promo['sale']?></td>
                                        <td><?=$promo['use_count']?></td>
                                        <td><a href="/admin/promo/<?=$promo['id']?>/delete">Удалить</a></td>
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