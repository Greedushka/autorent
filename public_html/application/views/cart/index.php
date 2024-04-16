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
    <div class="row">
        <div class="mx-auto" style="display: flex; justify-content: center; align-items: center">
            <?php if (empty($cart)): ?>
                <p>Корзина пуста</p>
            <?php else: ?>
            <div class="card-deck" style="margin-left: 15px !important; margin-right: 15px !important; width: 800px">
                <?php foreach ($cart as $val) { ?>
                        <div style="position: relative">
                            <a href="/cart/<?= $val['car']['id'] ?>/delete" style="
                            padding: 5px 10px;
                            font-size: 12px;
                            background: red;
                            border-radius: 30px;
                            border: 1px solid black;
                            color: white;
                            position: absolute;
                            z-index: 100;
                            right: 25px;
                            top: 5px;">X</a>
                        <a href="/car/<?=$val['car']['id']?>" style="width: 800px">
                            <div class="card mb-3" style="width: 800px">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="/public/imgs/<?= $val['car']['img'] ?>" alt="" width="250" height="185">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $val['car']['model'] . ' ' . $val['car']['brand'] ?></h5>
<!--                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>-->
                                            <p class="card-text"><small class="text-muted"><?=$val['car']['price'];?> Руб.</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>

                <?php } ?>
            </div>
                <div class="clearfix">
                    <!--                    --><?php //echo $pagination; ?>
                </div>
        </div>

        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="count-btns">
                <div class="input-group">
                     <span class="input-group-btn">
                        <button class="btn btn-dark left-btn" type="submit">
                            -
                        </button>
                    </span>
                    <input type="text" value="1" id="counter" class="count-days form-control" aria-label="readonly input example" readonly>
                    <span class="input-group-btn">
                        <button class="btn btn-dark right-btn" type="submit">
                            +
                        </button>
                    </span>
                </div>
            </div>
            <form action="" method="post" class="d-flex flex-wrap" style="gap: 10px; justify-content: center; align-items: center; margin-top: 5%; flex-direction: column" id="submitOrder">
                <div class="price-block">
<!--                    <div class="personalSale">10<span>%</span></div>-->

                    <div style="display: flex;" id="promoBlock">
                        <input type="text" name="promo" placeholder="Промокод" id="promo" class="form-control" aria-label="default input example">
                        <a class="btn btn-primary" onclick="promo();">Применить промокод</a>
                    </div>
                    <div id="promoText">
                    </div>

                    <h1 style="display: flex; justify-content: center; margin-top: 5%;"> <span class="badge badge-dark" style="display: flex; align-items: center; justify-content: center"><div class="price"><?=  array_sum(array_map(function($item) { return $item['car']['price']; }, $cart ));?></div><sub>₽</sub></span> </h1>
                </div>
                <button class="btn btn-success" type="submit">Оформить заказ</button>
            </form>

            <script>
                var input = document.querySelector('.count-days');
                var total_price = document.querySelector('.price');
                var final_price = total_price.innerHTML;
                //
                // var personalSale = document.querySelector('.personalSale');
                var counter = document.getElementById('counter').value;
                var submitOrder = document.getElementById('submitOrder');

                function promo() {


                    const formDataPromo = new FormData();
                    formDataPromo.append('promo', document.getElementById('promo').value);
                    const xhrPromo = new XMLHttpRequest();
                    xhrPromo.open('POST', '/cart/promo', true);
                    //xhrPromo.responseType = 'json';
                    xhrPromo.onload = function() {
                        if (xhrPromo.responseText != 0) {
                            total_price.innerHTML = final_price * document.getElementById('counter').value * (1 - xhrPromo.responseText / 100);
                            document.getElementById('promoBlock').style.display = 'none';
                            document.getElementById('promoText').textContent = 'Скидка в размере ' + xhrPromo.responseText + '% по промокоду';
                        }
                    }
                    xhrPromo.send(formDataPromo);
                }

                submitOrder.onsubmit = (e) => {
                    e.preventDefault();


                    const price = document.querySelector('.price').textContent;
                    const formData = new FormData();

                    formData.append('price', price);

                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', '/orders/add', true)
                    //xhr.setRequestHeader('Content-type', 'multipart/form-data');
                    xhr.onreadystatechange = function() {//Call a function when the state changes.
                        if(xhr.readyState == 4 && xhr.status == 200) {
                            alert(xhr.responseText);
                        }
                    }
                    //xhr.responseType = 'json';

                    xhr.send(formData);
                }

                document.querySelector('.left-btn').onclick = () => {
                    console.log(final_price)
                    total_price.textContent = (final_price*counter) - final_price;
                    counter--;
                    if(counter <= 1){
                        counter = 1;
                        total_price.textContent = final_price;
                    }
                    input.setAttribute('value', counter);
                }
                document.querySelector('.right-btn').onclick = () => {
                    console.log(final_price)
                    counter++;
                    input.setAttribute('value', counter);
                    total_price.textContent = final_price * counter;
                }
            </script>
        </div>
        <?php endif; ?>
    </div>
</div>