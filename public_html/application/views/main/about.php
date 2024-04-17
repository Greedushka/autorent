<header class="masthead" style="background-image: url('/public/imgs/about-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1>Тачки</h1>
                    <span class="subheading">Новости о машинах</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto d-flex justify-content-center" style="gap: 20px;">
            <?php foreach ($posts as $val): ?>
                <div class="card" style="width: 40rem;">
                    <img src="public/imgs/<?= $val['img'] ?>" class="card-img-top" alt="img" height="200">
                    <div class="card-body">
                        <h5 class="card-title"><?= $val['title'] ?></h5>
                        <p class="col-10 text-truncate card-text"><?= $val['description'] ?></p>
                        <a href="/post/<?= $val['id'] ?>" class="btn btn-dark">Читать далее...</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>