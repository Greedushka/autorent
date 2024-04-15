<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="/public/styles/admin.css">
        <link rel="stylesheet" href="/public/styles/bootstrap.css">
        <link rel="stylesheet" href="/public/styles/errors.css">
        <link rel="stylesheet" href="/public/styles/font-awesome.css">
        <link rel="stylesheet" href="/public/styles/main.css">
        <script src="/public/scripts/bootstrap.js"></script>
        <script src="/public/scripts/popper.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="/public/scripts/app.js"></script>
        <script src="/public/scripts/main.js"></script>
        <script src="//code.jivo.ru/widget/frC2fRe91N" async></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="/">Главная</a>

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="/about">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Обратная связь</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/cart">Корзина</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php echo $content; ?>
        <hr>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">

                        <p class="copyright text-muted">&copy; Timothy rent car</p>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>