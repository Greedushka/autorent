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
            <p>Мощность: <?= htmlspecialchars($data['horse_power'], ENT_QUOTES); ?><sub>/л.с</sub></p>
            <p class="car-price">Цена за час: <?= htmlspecialchars($data['price'], ENT_QUOTES); ?><sub>₽/час</sub></p>
            <p class="car-price">Категория: <?= $data['auto_type'] ? htmlspecialchars($data['auto_type']) : 'машина' ?></p>
            <p class="car-price">Цвет: <?= $data['color'] ? htmlspecialchars($data['color']) : 'чёрный' ?></p>

            <?php if (!isset($_SESSION['user'])): ?>
                <a class="btn btn-dark" href="/login">Войти</a>
            <?php endif; ?>

            <div class="btn submit">
                <button type="button" class="btn btn-primary placeAnOrder" <?= isset($_SESSION['user']) ? '' : 'hidden' ?> onclick="addToCart(<?= $data['id'] ?>)">Добавить в корзину</button>
            </div>
        </div>
    </div>
</div>

<script>
    function addToCart(itemId){

        const formDataPromo = new FormData();
        formDataPromo.append('id', itemId);
        const xhrPromo = new XMLHttpRequest();
        xhrPromo.open('POST', "/cart/add/" + itemId + '/', true);
        //xhrPromo.responseType = 'json';
        xhrPromo.onload = function() {
            alert('В корзине')
            console.log(data);
        }
        xhrPromo.send(formDataPromo);


        // $.ajax({
        //     type: 'POST',
        //     async: false,
        //     url: "/cart/add/" + itemId + '/',
        //     dataType: 'json',
        //     data: {
        //         id: itemId
        //     },
        //     success: function(data){
        //         alert('В корзине')
        //         console.log(data);
        //     },
        //     error: function (error) {
        //         console.log(error);
        //     }
        // });
    }
</script>