
<div class="container">
    <?php if ($is_admin): ?>
        <div class="row">
            <form enctype="multipart/form-data" action="/companies/addimage" method="POST">
                <input style="display: none;" id="image_upload_btn_hidden" accept="image/png" name="new_image" type="file" />
                <b>Подпись:</b>
                <input type="text" name="name"/>
                <button type="button" id="image_upload_btn">Загрузить</button>
                <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>"/>
                <input type="hidden" name="company-id" value="<?= $id ?>"/>
            </form>
        </div>
        <div style="height: 20px;"></div>
    <?php endif; ?>
    <div class="row">
        <?php for ($i = 0; $i < count($images); $i++): ?>
            <?php if ($images[$i]['carousel'] && !$is_admin) continue; ?>
            <?php if ($i != 0 && $i % 3 == 0): ?>
            </div>
            <div class="row">
            <?php endif; ?>
            <div class="col-md-2 gallery-item">
                <?php if ($is_admin): ?>
                    <a data-id="<?= $images[$i]['id'] ?>" style="color:red;" class="del_img_btn">Удалить</a>
                    <a data-id="<?= $images[$i]['id'] ?>" style="color:green;" class="edit_img_btn">Изменить</a>
                    <div style="float:right">Карусель
                        <input data-id="<?= $images[$i]['id'] ?>" type="checkbox" class="carousel_checkbox" <?= $images[$i]['carousel'] ? 'checked' : '' ?> ></div>
                <?php endif; ?>
                <div class="image-helper"></div>
                <img data-original="<?= $images[$i]['original'] ?>" src="<?= $images[$i]['preview'] ?>">
                <center class="name-text"><?= $images[$i]['name'] ?></center>
                <input class="name-edit" style="display: none;" type="text" value="<?= $images[$i]['name'] ?>"/>
            </div>
        <?php endfor; ?>
    </div>
</div>
