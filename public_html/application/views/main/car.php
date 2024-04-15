<header class="masthead car-img" style="padding-bottom: 50px; background-image: linear-gradient(to right, rgba(66,66,66,0.75), rgba(103,103,103,0.75)), url('/public/imgs/<?= $data['img'] ?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1 class="car-brand"><?= htmlspecialchars($data['brand'], ENT_QUOTES); ?></h1>
                    <span class="subheading car-model"><?= htmlspecialchars($data['model'], ENT_QUOTES); ?></span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <p><?= htmlspecialchars($data['horse_power'], ENT_QUOTES); ?></p>
            <p class="car-price"><?= htmlspecialchars($data['price'], ENT_QUOTES); ?></p>
        </div>
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="btn submit">
                <button type="button" class="btn btn-primary placeAnOrder" onclick="addToCart(<?= $data['id'] ?>)">Добавить в корзину</button>
            </div>
        </div>
    </div>
</div>