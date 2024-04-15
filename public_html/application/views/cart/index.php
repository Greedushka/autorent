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
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php if (empty($cart)): ?>
                <p>Корзина пуста</p>
            <?php else: ?>
                <?php foreach ($cart as $val): ?>
                    <div class="post-preview">
                        <a href="/car/<?php echo $val['id']; ?>">
                            <img class="card-img" src="/public/imgs/<?php echo htmlspecialchars($val['car_img'], ENT_QUOTES); ?>">
                            <h5 class="car-subtitle"><?php echo htmlspecialchars($val['car'], ENT_QUOTES); ?></h5>
                        </a>
                        <p class="post-meta total-price">Цена: <?php echo $val['price']; ?> <i>Руб./сутки</i></p>
                    </div>
                    <hr>
                <?php endforeach; ?>
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
                    <input type="text" value="1" class="count-days form-control" aria-label="readonly input example" readonly>
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
                <input type="text" placeholder="Промокод" class="form-control" aria-label="default input example">
                <h1 style="display: flex; justify-content: center; margin-top: 5%;"> <span class="badge badge-dark" style="display: flex; align-items: center; justify-content: center"><div class="price"><?php echo  array_sum(array_map(function($item) { return $item['price']; }, $cart ));?></div><sub>₽</sub></span> </h1>
                <button class="btn btn-success" type="submit">Оформить заказ</button>
            </form>

            <script>
                let input = document.querySelector('.count-days');
                let total_price = document.querySelector('.price');
                let final_price = total_price.innerHTML;
                let counter = 1;
                let submitOrder = document.getElementById('submitOrder');

                submitOrder.onsubmit = (e) => {
                    e.preventDefault();
                    console.log('clicked')
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

                    console.log(formData.get('car'))

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