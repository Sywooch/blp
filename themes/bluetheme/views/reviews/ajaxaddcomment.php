<?php
//echo '<pre>'; print_r($_POST); echo '</pre>';

// Вывод данных


if(isset($error) && $error){
	echo 'Ошибка записи данных';
}else{
	echo '<p style="padding:10px;border:1px solid #090;border-radius:5px;margin-bottom:20px;">Ваше сообщение успешно добавлено</p>';
}
?>


<?php foreach($reviewComments['reviewComment'] as $comment){?>
    <div class="news_list_day_item clear commentsreview-wrapper-common">

            <div class="commentreview-title-common"><?=$comment['author_name']?></div>
            <div class="commentreview-text-common">
                <?=$comment['text']?>
            </div>
            <div class="category_date_views" style="position:relative;">
                <span class="date" id="date"><?=$comment['date']?></span>
            </div>

    </div>
<?php } ?>