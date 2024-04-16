
<header class="masthead" style="background-image: linear-gradient(to right, rgba(66,66,66,0.75), rgba(122,122,122,0.75)), url('/public/imgs/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Timothy INC</h1>
                    <span class="subheading">аренда премиум авто с 1995 года</span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
<h1>Ваши заказы</h1>
<table id="example" class="table table-striped" style="width:100%">
    <thead>
    <tr>
        <th>ID</th>
        <th>Стоимость заказа</th>
        <th>Дата</th>

    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $key => $val): ?>
    <tr>
        <td><?= ++$key ?></td>
        <td><?= $val['price'] ?></td>
        <td><?= $val['date'] ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</div>