<div class="content-wrapper" style="margin: 0 !important;">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/addpost" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Титульник поста</label>
                                <input class="form-control" type="textarea" name="title">
                            </div>
                            <div class="form-group">
                                <label>Описание поста</label>
                                <input class="form-control" type="text" name="desc">
                            </div>
                            <div class="form-group">
                                <label>Изображение поста</label>
                                <input class="form-control" type="file" name="postimg">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>