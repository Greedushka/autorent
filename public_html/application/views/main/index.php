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
            <?php if (empty($cars)): ?>
                <p>Список постов пуст</p>
            <?php else: ?>
                <?php foreach ($cars as $val): ?>
                    <div class="post-preview">
                        <a href="/car/<?php echo $val['id']; ?>">
                            <h2 class="post-title"><?php echo htmlspecialchars($val['brand'], ENT_QUOTES); ?></h2>
                            <h5 class="post-subtitle"><?php echo htmlspecialchars($val['model'], ENT_QUOTES); ?></h5>
                        </a>
                        <p class="post-meta">Цвет: <?php echo $val['color']; ?></p>
                    </div>
                    <hr>
                <?php endforeach; ?>
                <div class="clearfix">
<!--                    --><?php //echo $pagination; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>