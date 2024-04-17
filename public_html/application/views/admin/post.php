<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <img src="<?='/public/imgs/' . $data['img']?>" width="300" height="150">

                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/post/<?=$data['id']?>/save" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Титульник</label>
                                <input class="form-control" type="text" name="title" value="<?=$data['title']?>">
                            </div>
                            <div class="form-group">
                                <label>Описание</label>
                                <input class="form-control" type="text" name="description" value="<?=$data['description'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Описание</label>
                                <input class="form-control" type="file" name="img">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>