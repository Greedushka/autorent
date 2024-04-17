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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    </head>
    <body class="sticky-footer">









    <?php if ($this->route['action'] != 'login'): ?>
        <div class="wrapper">
            <input type="checkbox" id="btn" hidden>
            <label for="btn" class="menu-btn">
                <i class="fas fa-bars"></i>
                <i class="fas fa-times"></i>
            </label>
            <nav id="sidebar" style="    z-index: 100;">
                <div class="title">Side Menu</div>
                <ul class="list-items">
                    <li>
                        <a href="/admin/add">
                            <i class="fa fa-fw fa-plus"></i>
                            <span>Добавить машину</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/cars">
                            <i class="fa fa-car" aria-hidden="true"></i>
                            <span>Машины</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/promo">
                            <i class="fa fa-fw fa-list"></i>
                            <span">Промокоды</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/addpost">
                            <i class="fa fa-fw fa-plus"></i>
                            <span>Добавить пост</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/posts">
                            <i class="fa fa-book" aria-hidden="true"></i>
                            <span>Посты</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/user">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <span>Пользователи</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/orders">
                            <i class="fa fa-first-order" aria-hidden="true"></i>
                            <span>Заказы</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/reviews">
                            <i class="fa fa-first-order" aria-hidden="true"></i>
                            <span>Отзывы</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/logout">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <span>Выход</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }
            .wrapper{
                height: 100%;
                width: 300px;
                position: relative;
            }
            .wrapper .menu-btn{
                position: fixed;
                left: 97vw;
                top: 10px;
                background: #4a4a4a;
                color: #fff;
                height: 45px;
                width: 45px;
                z-index: 9999;
                border: 1px solid #333;
                border-radius: 5px;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.3s ease;
            }
            #btn:checked ~ .menu-btn{
                left: 247px;
            }
            .wrapper .menu-btn i{
                position: absolute;
                transform: ;
                font-size: 23px;
                transition: all 0.3s ease;
            }
            .wrapper .menu-btn i.fa-times{
                opacity: 0;
            }
            #btn:checked ~ .menu-btn i.fa-times{
                opacity: 1;
                transform: rotate(-180deg);
            }
            #btn:checked ~ .menu-btn i.fa-bars{
                opacity: 0;
                transform: rotate(180deg);
            }
            #sidebar{
                position: fixed;
                background: #404040;
                height: 100%;
                width: 270px;
                overflow: hidden;
                left: -270px;
                transition: all 0.3s ease;
            }
            #btn:checked ~ #sidebar{
                top: 0;
                left: 0;
            }
            #sidebar .title{
                line-height: 65px;
                text-align: center;
                background: #333;
                font-size: 25px;
                font-weight: 600;
                color: #f2f2f2;
                border-bottom: 1px solid #222;
            }
            #sidebar .list-items{
                position: relative;
                background: #404040;
                width: 100%;
                height: 100%;
                list-style: none;
            }
            #sidebar .list-items li{
                padding-left: 40px;
                line-height: 50px;
                border-top: 1px solid rgba(255,255,255,0.1);
                border-bottom: 1px solid #333;
                transition: all 0.3s ease;
            }
            #sidebar .list-items li:hover{
                border-top: 1px solid transparent;
                border-bottom: 1px solid transparent;
                box-shadow: 0 0px 10px 3px #222;
            }
            #sidebar .list-items li:first-child{
                border-top: none;
            }
            #sidebar .list-items li a{
                color: #f2f2f2;
                text-decoration: none;
                font-size: 18px;
                font-weight: 500;
                height: 100%;
                width: 100%;
                display: block;
            }
            #sidebar .list-items li a i{
                margin-right: 20px;
            }
            #sidebar .list-items .icons{
                width: 100%;
                height: 40px;
                text-align: center;
                position: absolute;
                bottom: 100px;
                line-height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            #sidebar .list-items .icons a{
                height: 100%;
                width: 40px;
                display: block;
                margin: 0 5px;
                font-size: 18px;
                color: #f2f2f2;
                background: #4a4a4a;
                border-radius: 5px;
                border: 1px solid #383838;
                transition: all 0.3s ease;
            }
            #sidebar .list-items .icons a:hover{
                background: #404040;
            }
            .list-items .icons a:first-child{
                margin-left: 0px;
            }
            .content{
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
                color: #202020;
                z-index: -1;
                width: 100%;
                text-align: center;
            }
            .content .header{
                font-size: 45px;
                font-weight: 700;
            }
            .content p{
                font-size: 40px;
                font-weight: 700;
            }
        </style>
        <?php endif; ?>
        <?php echo $content; ?>
    </body>
</html>