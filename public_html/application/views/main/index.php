<?php $db = new \application\lib\Db();
$max_price = $db->column('SELECT MAX(price) FROM car');
$min_price = $db->column('SELECT MIN(price) FROM car')
?>
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
<form class="filters" style="max-width: 500px; padding: 0 15px" action="filter" method="post">
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <hr>
        <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Фильтры
            </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <div class="filter row" style="gap: 20px">
                    <div class="auto_name row flex-column">
                        <label for="auto-name">Наименование авто</label>
                        <input type="text" id="auto-name">
                    </div>
                    <hr>
                    <div class="price row flex-column">
                        <div id="slider-outer-div">
                            <div id="slider-max-label" class="slider-label"></div>
                            <div id="slider-min-label" class="slider-label"></div>
                            <div id="slider-div">
                                <div><?= $min_price ?> Руб.</div>
                                <div>
                                    <input id="ex2" type="text" data-slider-min="<?= $min_price ?>"
                                           data-slider-max="<?= $max_price ?>" data-slider-value="[<?= $min_price ?>,<?= $max_price ?>]"
                                           data-slider-tooltip="hide" />
                                </div>
                                <div><?= $max_price ?> Руб.</div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Применить фильтры</button>
                    </div>
                    <style>
                        #slider-div {
                            display: flex;
                            flex-direction: row;
                            margin-top: 30px;
                        }

                        #slider-div>div {
                            margin: 8px;
                        }

                        .slider-label {
                            position: absolute;
                            background-color: #eee;
                            padding: 4px;
                            font-size: 0.75rem;
                        }
                    </style>
                    <script>
                        const setLabel = (lbl, val) => {
                            const label = $(`#slider-${lbl}-label`);
                            label.text(val);
                            const slider = $(`#slider-div .${lbl}-slider-handle`);
                            const rect = slider[0].getBoundingClientRect();
                            label.offset({
                                left: rect.left
                            });
                        }

                        const setLabels = (values) => {
                            setLabel("min", values[0]);
                            setLabel("max", values[1]);
                        }


                        $('#ex2').slider().on('slide', function(ev) {
                            setLabels(ev.value);
                        });
                        setLabels($('#ex2').attr("data-value").split(","));
                    </script>
                </div>
            </div>
        </div>
    </div>
    <hr>
</form>
        <div class="card-deck" style="margin-left: 15px !important; margin-right: 15px !important;">
            <?php foreach ($cars as $val) { ?>
                <div class="col-3" style="margin-top: 20px">
                    <a href="/car/<?=$val['id']?>">
                    <div class="card h-100">
                        <img src="/public/imgs/<?= $val['img']?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?= $val['brand'].' '.$val['model'] ?></h5>
                            <p class="card-text">some text about car</p>
                        </div>
                    </div>
                    </a>
                </div>


            <?php } ?>
        </div>
