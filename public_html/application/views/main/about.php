<?php

use application\lib\Db;

$db = new Db();
$cars = $db->row('SELECT * FROM car');
?>

<header class="masthead" style="background-image: url('/public/imgs/about-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1>Я программист</h1>
                    <span class="subheading">записываю бесплатные обучающие видео по PHP</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto d-flex justify-content-center">
            <div class="card-deck">
        <?php foreach ($cars as $key => $car): ?>
            <div class="card">
                <div class="card-head"><?=  $car['brand']." ".$car['model'] ?></div>
                    <img src="/public/imgs/20180120195009S__18350116-1000x800.jpg" alt="" class="card-img-center">
                <div class="card-footer">
                    <p>Пробег: <?= $car['mileage'] ?></p>
                    <p>Разгон: <?= $car['overclocking'] ?></p>
                    <p>КПП: <?= $car['kpp'] ?></p>
                    <p>Топливо: <?= $car['fuel_type'] ?></p>
                    <p>Л.С: <?= $car['horse_power'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>