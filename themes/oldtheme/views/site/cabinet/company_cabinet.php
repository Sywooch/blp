<?php

function render_childrens($l_reviews) {

    if ($l_reviews):

        foreach ($l_reviews as $r):
            $user_id = Yii::$app->user->id;
            $owner = ($r->user_id == $user_id);
            ?>
            <div  class="answer">
                <div class="answer-header">
                    <span><?php echo ($owner) ? 'Ответ представителя СК' : $r->AuthorName ?>:</span>
                    <?php if ($owner): ?>
                        <div class="answer-header-actions"><div class="glyphicon glyphicon-pencil answer-edit"></div></div>
                    <?php endif; ?>
                </div>
                <div class="answer-body">
                    <div class="answer-body-text"><?= $r->text ?></div>
                    <div class="answer-editor" data-id="<?= $r->id ?>">
                        <form action="cabinet/editanswer" method="POST">
                            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                            <input type="hidden" name="comment_id" value="<?= $r->id ?>">
                            <input type="hidden" name="entity_id" value="<?= $r->entity_id ?>">
                            <textarea class="answer-ckeditor-textarea" id="editor_<?= $r->id ?>" placeholder="Ваш ответ" name="comment" style="width:100%;height:100px;resize: none;padding:10px;vertical-align:middle;"><?= $r->text ?></textarea>
                            <input type="submit" value="Отправить" class="cabinet_button_answer_go">
                        </form>
                    </div>
                </div>
                <div class="answer-footer">оставлен <?= $r->created_date ?></div>
            </div>
            <?php
            render_childrens($r->childrens());
        endforeach;
    endif;
}
?>
<div style="width:940px;">
    <div id="olit-content"><div style="float:left;width:641px;">
            <h1 class="heading">Личный кабинет</h1>
            <div class="reviews">
                <?php foreach ($reviews['reviews'] as $review): ?>
                    <div class="review-answers-block">
                        <div class="review" data-id="<?= $review['id'] ?>">
                            <div class="review-header">
                                <?= $review['author'] ?>, <?= $review['city'] ?>
                            </div>
                            <div class="review-body">
                                <?= $review['text'] ?>
                            </div>
                            <div class="review-footer">
                                <?= !empty($review['type_name']) ? $review['type_name'] . ',' : '' ?> оставлен <?= $review['date'] ?>
                            </div>
                        </div>

                        <?php
                        if ($review['text']):
                            render_childrens($review['comments']);
                        endif;
                        ?>
                        <div class="review-actions">
                            <div id="cabinet_button_answer" class="cabinet_button_answer" data-id="<?= $review['id'] ?>">Ответить</div>
                        </div>
                        <div class="cabinet_form_answer" data-id="<?= $review['id'] ?>" style="display:none;border-top:1px solid #bebebe;padding:20px;">
                            <form action="cabinet/addanswer" method="POST">
                                <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                                <input type="hidden" name="review_id" value="<?= $review['id'] ?>">
                                <textarea class="ckeditor" id="editor_<?= $review['id'] ?>" placeholder="Ваш ответ" name="comment" style="width:100%;height:100px;resize: none;padding:10px;vertical-align:middle;"></textarea>
                                <input type="submit" value="Отправить" class="cabinet_button_answer_go">
                            </form>
                        </div>

                    </div>
                    <div class="review-splitter"></div>
                <?php endforeach; ?>
                <?= yii\widgets\LinkPager::widget(['pagination' => $reviews['pages']]) ?>
            </div>
        </div>
        <div style="float:right;width:290px;">
            <div id="left_block_top_head">СТРАХОВАЯ КОМПАНИЯ</div>
            <form id="edit_form" action="/cabinet/editinfo" method="post">
                <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                <div class="cabinet_right_block">
                    <div id="cabinet_right_block_content">
                        <div id="cabinet_right_block_foto"><img src="<?= $detail['logo'] ?>"></div>
                        <div id="cabinet_right_block_lable">Полное название:</div>
                        <div><?= $detail['name'] ?></div>
                    </div>
                    <div id="cabinet_right_block_content">
                        <div id="cabinet_right_block_lable">Адрес:</div>
                        <div class="cpmpany_info_text" data-id="address"><?= $detail['address'] ?></div>
                        <div class="cpmpany_info_input" style="display: none;">
                            <input id="company_address" name="address" value="<?= $detail['address'] ?>">
                        </div>
                    </div>
                    <div id="cabinet_right_block_content">
                        <div id="cabinet_right_block_lable">Телефон:</div>
                        <div class="cpmpany_info_text" data-id="phone"><?= $detail['phone'] ?></div>
                        <div class="cpmpany_info_input" style="display: none;">
                            <input id="company_phone" name="phone" value="<?= $detail['phone'] ?>">
                        </div>
                    </div>
                    <div id="cabinet_right_block_content">
                        <div id="cabinet_right_block_lable">Сайт:</div>
                        <div class="cpmpany_info_text" data-id="site"><a href="<?= $detail['site'] ?>"><?= $detail['site'] ?></a></div>
                        <div class="cpmpany_info_input" style="display: none;">
                            <input id="company_site" name="site" value="<?= $detail['site'] ?>">
                        </div>
                    </div>
                    <div id="cabinet_right_block_content">
                        <div id="cabinet_right_block_lable">Лицензия ФССН:</div>
                        <div class="cpmpany_info_text" data-id="license"><?= $detail['license'] ?></div>
                        <div class="cpmpany_info_input" style="display: none;">
                            <input id="company_license" name="license" value="<?= $detail['license'] ?>">
                        </div>
                    </div>
                </div>
                <div style="background:white;font-size:14px;">
                    <div style="border-bottom:1px solid #f3f3f3;padding:20px 10px;">
                        <div class="cpmpany_info_text"><a class="underline" id="edit_button">Редактировать данные</a></div>
                        <div class="cpmpany_info_input" style="display:none;"><a id="save_button" class="underline">Сохранить</a></div>
                    </div>
                    <div style="border-bottom:1px solid #f3f3f3;padding:20px 10px;"><a class="underline" href="/cabinet/edituserinfo">Личные данные</a></div>
                    <div style="border-bottom:1px solid #f3f3f3;padding:20px 10px;"><a class="underline" href="/index.php?do=logout">Выйти</a></div>
                </div>
            </form>

            <div id="left_block_top_head" style="margin-top:20px;">РЕЙТИНГ</div>
            <div style="background:white;font-size:14px;">
                <div style="border-bottom:1px solid #f3f3f3;padding:20px 10px;text-align:center;">Отзывов: <span style="text-decoration:underline;"><?= $rating['reviews'] ?></span></div>
                <div style="border-bottom:1px solid #f3f3f3;padding:20px 10px;text-align:center;">Место:<?= $rating['place'] ?></div>
                <div style="padding:20px 10px;text-align:center;">Рейтинг:<?= $rating['rating'] ?></div>
            </div>

            <div id="left_block_top_head" style="margin-top:20px;">ПРЕДСТАВИТЕЛЬ СК</div>
            <div style="background:white;font-size:14px;text-align:center;padding:20px 0px;">
                Раздел в стадии разработки
            </div>
        </div>
        <script>
            CKEDITOR.replaceAll('.ckeditor');
            $("#edit_button").click(function() {
                $(".cpmpany_info_text").hide();
                $(".cpmpany_info_input").show();
            });
            $("#save_button").click(function() {
                $("#edit_form").submit();
            });
            $(".cabinet_button_answer").click(function() {
                $(this).hide();
                $(".cabinet_form_answer[data-id=" + $(this).data("id") + "]").show();
            });
            $('.answer-edit').click(function() {
                var answer_body = $(this).closest('.answer').find('.answer-body');

                answer_body.find('.answer-editor').show();

                CKEDITOR.replace(answer_body.find('.answer-ckeditor-textarea').attr('id'));
            })
        </script>
        <style>
            .cpmpany_info_input INPUT{
                width:262px;
                height:22px;
                padding-left:2px;	
            }
        </style>
    </div>
</div>