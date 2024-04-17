<div class="content-wrapper" style="margin: 10px 0 !important;">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/add" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Марка</label>
                                <input class="form-control" type="text" name="model">
                            </div>
                            <div class="form-group">
                                <label>Бренд</label>
                                <input class="form-control" type="text" name="brand">
                            </div>
                            <div class="form-group">
                                <label>Дата производства</label>
                                <input class="form-control" type="text" name="production_date">
                            </div>
                            <div class="form-group">
                                <label>Пробег</label>
                                <input class="form-control" type="text" name="mileage">
                            </div>
                            <div class="form-group">
                                <label>Разгон</label>
                                <input class="form-control" type="text" name="overclocking">
                            </div>
                            <div class="form-group">
                                <label>Объём бака</label>
                                <input class="form-control" type="text" name="gas_tank">
                            </div>
                            <div class="form-group">
                                <label>КПП</label>
                                <input class="form-control" type="text" name="kpp">
                            </div>
                            <div class="form-group">
                                <label>Л.с</label>
                                <input class="form-control" type="text" name="horse_power">
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
                                <input class="form-control" type="text" name="price">
                            </div>
                            <div class="form-group">
                                <label>Тип авто</label>
                                <input class="form-control" type="text" name="auto_type">
                            </div>
                            <div class="form-group">
                                <label>Цвет</label>
                                <input class="form-control" type="text" name="color">
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