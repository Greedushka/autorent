<?php
$db = new \application\lib\Db();

$reviews = $db->row("SELECT * FROM reviews WHERE user_id = {$this->route['id']} AND car_id = {$data['id']}")


?>

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
            <p class="car-price">Цена за сутки: <?= htmlspecialchars($data['price'], ENT_QUOTES); ?><sub>₽/час</sub></p>
            <p class="car-price">Категория: <?= $data['auto_type'] ? htmlspecialchars($data['auto_type']) : 'машина' ?></p>
            <p class="car-price">Цвет: <?= $data['color'] ? htmlspecialchars($data['color']) : 'чёрный' ?></p>

            <?php if (!isset($_SESSION['user'])): ?>
                <a class="btn btn-dark" href="/login">Войти</a>
            <?php endif; ?>

            <div class="btn submit">
                <button type="button" class="btn btn-outline-dark placeAnOrder" <?= isset($_SESSION['user']) ? '' : 'hidden' ?> onclick="addToCart(<?= $data['id'] ?>)">Добавить в корзину</button>
            </div>
        </div>
    </div>
</div>
<div class="row d-flex justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-0 border" style="background-color: #f0f2f5;">
            <div class="card-body p-4">
                <?php if (isset($_SESSION['user'])): ?>
                <form method="post" action="/createreview" class="form-outline mb-4" id="createReview" style="    display: flex;   justify-content: center;   flex-direction: column;">
                    <div class="rating" data-total-value="0" style="align-self: flex-start" id="rating">
                        <div class="rating--item rate-item" data-item-value="5">★</div>
                        <div class="rating--item rate-item" data-item-value="4">★</div>
                        <div class="rating--item rate-item" data-item-value="3">★</div>
                        <div class="rating--item rate-item" data-item-value="2">★</div>
                        <div class="rating--item rate-item" data-item-value="1">★</div>
                    </div>
                    <label for="addANote" style="align-self: center">Напишите нам свой отзыв</label><textarea id="addANote" class="form-control"></textarea>
                    <button class="form-label btn btn-dark" type="submit" style="margin-top: 10px">Оставить отзыв</button>
                </form>
                <?php endif; ?>
                <script>
                    let reviewForm = document.getElementById('createReview')

                    document.getElementById('addANote').oninput = (ta) => {
                        document.getElementById('addANote').textContent = ta.value;
                    }

                    reviewForm.onsubmit = (e) => {
                        e.preventDefault()

                        const formData = new FormData();
                        formData.append('stars_count', document.getElementById('rating').dataset.totalValue)
                        formData.append('description', document.getElementById('addANote').value)
                        formData.append('car_id', <?= $data['id'] ?>)
                        formData.append('user_id', <?= $this->route['id'] ?>)
                        const xhr = new XMLHttpRequest();
                        xhr.open('POST', 'createreview', true)

                        xhr.onload = () => {
                            alert('Отзыв оставлен')

                        }

                        xhr.send(formData);
                    }
                </script>
                <?php foreach ($reviews as $key => $value): ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <p><?= $value['description'] ?></p>

                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <p class="small mb-0 ms-2">Пользователь </p>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <div class="rating" data-total-value="<?= $value['stars_count'] ?>">
                                    <div class="rating--item" data-item-value="5">★</div>
                                    <div class="rating--item" data-item-value="4">★</div>
                                    <div class="rating--item" data-item-value="3">★</div>
                                    <div class="rating--item" data-item-value="2">★</div>
                                    <div class="rating--item" data-item-value="1">★</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
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


    }
</script>

<style>
    .rating{
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
    }
    .rating--item{
        color: #b2b2b2;
        font-size: 25px;
        cursor: pointer;
        transition: .2s;
    }
    .rating--item:hover,
    .rating--item:hover ~ .rating--item{
        color: #989898;
        transition: .2s;
    }
    .rating[data-total-value="1"] .rating--item:nth-child(n + 5),
    .rating[data-total-value="2"] .rating--item:nth-child(n + 4),
    .rating[data-total-value="3"] .rating--item:nth-child(n + 3),
    .rating[data-total-value="4"] .rating--item:nth-child(n + 2),
    .rating[data-total-value="5"] .rating--item:nth-child(n + 1){
        color: goldenrod;
    }

</style>
<script>
    const ratingitemslist = document.querySelectorAll('.rate-item')

    ratingitemslist.forEach(item =>
        item.addEventListener('click', () => {
            const {itemValue} = item.dataset
            item.parentNode.dataset.totalValue = itemValue;
        })
    )
</script>