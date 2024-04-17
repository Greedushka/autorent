<div class="content-wrapper" style="margin: 0 !important;">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <img src="<?='/public/imgs/' . $vars['car']['img']?>" width="300" height="150">

                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/car/<?=$vars['car']['id']?>/save" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Марка</label>
                                <input class="form-control" type="text" name="model" value="<?=$vars['car']['model']?>">
                            </div>
                            <div class="form-group">
                                <label>Бренд</label>
                                <input class="form-control" type="text" name="brand" value="<?=$vars['car']['brand']?>">
                            </div>
                            <div class="form-group">
                                <label>Дата производства</label>
                                <input class="form-control" type="text" name="production_date" value="<?=$vars['car']['production_date']?>">
                            </div>
                            <div class="form-group">
                                <label>Пробег</label>
                                <input class="form-control" type="text" name="mileage" value="<?=$vars['car']['mileage']?>">
                            </div>
                            <div class="form-group">
                                <label>Разгон</label>
                                <input class="form-control" type="text" name="overclocking" value="<?=$vars['car']['overclocking']?>">
                            </div>
                            <div class="form-group">
                                <label>Объём бака</label>
                                <input class="form-control" type="text" name="gas_tank" value="<?=$vars['car']['gas_tank']?>">
                            </div>
                            <div class="form-group">
                                <label>КПП</label>
                                <input class="form-control" type="text" name="kpp" value="<?=$vars['car']['kpp']?>">
                            </div>
                            <div class="form-group">
                                <label>Л.с</label>
                                <input class="form-control" type="text" name="horse_power" value="<?=$vars['car']['horse_power']?>">
                            </div>
                            <div class="form-group">
                                <label>Топливо</label>
                                <select class="form-control" name="fuel_type">
                                    <option value="Бензин">Бензин</option>
                                    <option value="Электричество">Электричество</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Цена</label>
                                <input class="form-control" type="text" name="price" value="<?=$vars['car']['price']?>">
                            </div>
                            <div class="form-group">
                                <label>Тип авто</label>
                                <input class="form-control" type="text" name="auto_type" value="<?=$vars['car']['auto_type']?>">
                            </div>
                            <div class="form-group">
                                <label>Цвет</label>
                                <input class="form-control" type="text" name="color" value="<?=$vars['car']['color']?>">
                            </div>
                            <div class="form-group">
                                <label>Изображение</label>
                                <input class="form-control" type="file" name="img">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>