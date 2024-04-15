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
                        <a href="/car/<?=$val['id']?>" style="width: 800px">
                            <div class="card mb-3" style="width: 800px">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="/public/imgs/<?= $val['car_img'] ?>" alt="" width="250" height="185">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>


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
            <form action="" method="post" class="d-flex flex-wrap" style="gap: 10px; justify-content: center; align-items: center; margin-top: 5%" id="submitOrder">
                <input type="text" placeholder="Ваше имя" name="name" class="form-control" aria-label="default input example">
                <input type="text" placeholder="Ваша фамилия" name="surname" class="form-control" aria-label="default input example">
                <input type="text" placeholder="Номер телефона" name="phone" class="form-control" aria-label="default input example">
                <input type="text" placeholder="Почта" name="email" class="form-control" aria-label="default input example">

                <div style="display: flex;"><div class="personalSale">10</div>%</div>

                <div style="display: flex;" id="promoBlock">
                    <input type="text" name="promo" placeholder="Промокод" id="promo" class="form-control" aria-label="default input example">
                    <a class="btn btn-primary" onclick="promo();">Применить промокод</a>
                </div>
                <div id="promoText">
                </div>

                <h1 style="display: flex; justify-content: center; margin-top: 5%;"> <span class="badge badge-dark" style="display: flex; align-items: center; justify-content: center"><div class="price"><?php echo  array_sum(array_map(function($item) { return $item['price']; }, $cart ));?></div><sub>₽</sub></span> </h1>
                <button class="btn btn-success" type="submit">Оформить заказ</button>
            </form>

            <script>
                var input = document.querySelector('.count-days');
                var total_price = document.querySelector('.price');
                var final_price = total_price.innerHTML;

                var personalSale = document.querySelector('.personalSale');
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
                    const car = document.querySelector('.car-subtitle').textContent;
                    const car_img = document.querySelector('.card-img').src;
                    const user_id = 1;
                    const price = document.querySelector('.price').textContent;
                    const product_id = 1;
                    const formData = new FormData();
                    formData.append('car', car);
                    formData.append('car_img', car_img);
                    formData.append('user_id', user_id);
                    formData.append('price', price);
                    formData.append('product_id', product_id)

                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', '/orders/add', true)
                    //xhr.setRequestHeader('Content-type', 'multipart/form-data');
                    xhr.onreadystatechange = function() {//Call a function when the state changes.
                        if(xhr.readyState == 4 && xhr.status == 200) {
                            alert(xhr.responseText);
                        }
                    }
                    xhr.responseType = 'json';

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