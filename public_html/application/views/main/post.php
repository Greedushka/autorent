

<header class="masthead car-img" style="padding-bottom: 50px; background-image: linear-gradient(to right, rgba(66,66,66,0.75), rgba(103,103,103,0.75)), url('/public/imgs/<?= $data['img'] ?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1 class="car-brand"><?= htmlspecialchars($data['title'], ENT_QUOTES); ?></h1>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="mx-auto">
            <div class="container">
                <p class="text-break" ><?= htmlspecialchars($data['description'], ENT_QUOTES); ?></p>
            </div>
        </div>
    </div>
</div>

