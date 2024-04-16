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
    <form action="/authorize" method="POST">
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="login" name="login" id="form2Example1" class="form-control"  />
            <label class="form-label" for="form2Example1">Логин</label>
        </div>

        <!-- Password input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="password" name="password" id="form2Example2" class="form-control" />
            <label class="form-label" for="form2Example2">Пароль</label>
        </div>

        <!-- Submit button -->
        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Войти</button>

        <!-- Register buttons -->
        <div class="text-center">
            <p>Ещё нет аккаунта? <a href="/registration">Зарегистрироваться</a></p>


        </div>
    </form>
</div>


