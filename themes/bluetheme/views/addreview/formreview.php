<?php
use yii\helpers\Html;
use yii\jui\AutoComplete;
?>
    
<main class="content_fifth clear feedbackPage">
    <section class="content_fifth_left clear">
        <div class="content_fifth_left_leaveFeedback">
            <p class="feedbackPage_title">Добавить отзыв о страховой компании</p>
            <p class="feedbackPage_request">Искренность отзыва крайне важна. Имеено за этими отзывами и приходят на наш сайт. Благодарим Вас за то что оставляете отзыв о компании с которой Вы уже имели опыт в работе.</p>
            <div id="leave_feedback_form">
                <p class="content_fifth_left_infoTitle">Личная информация</p>
                    <?= Html::beginForm('/addreview/addreview', 'post')?>
                    <?= Html::activeHiddenInput($review, 'mt_rand')?><br>
                    <?= Html::error($review, 'name', ['class'=>' error', ])?><br>
                    <?= Html::activeInput('text', $review, 'name', ['placeholder'=>'Ваше имя'])?><br>

                    <?= Html::error($review, 'email', ['class'=>' error'])?><br>
                    <?= Html::activeInput('email', $review, 'email', ['placeholder'=>'Ваш e-mail'])?><br>

                    <?= Html::error($review, 'city', ['class'=>'error'])?><br>
                    <?= Html::activeInput('city', $review, 'city', ['placeholder'=>'Ваш город'])?><br><br>
                    <p class="content_fifth_left_infoTitle">Информация о компании</p>
                    <div class="mySelectStyle">
                        <?= Html::error($review, 'company_id', ['class'=>'error'])?>
                        <?=Html::activeDropDownList($review, 'company_id', $companes) ?>
                    </div>
                    <div class="mySelectStyle">
                        <?= Html::error($review, 'type', ['class'=>'content_fifth_left_leaveFeedback_share error'])?>
                        <?= Html::activeDropDownList($review, 'type', [''=>'Вид страхования']+$type) ?>
                    </div>

                <?= Html::error($review, 'rating', ['class'=>'error'])?><br>
                <span class="content_fifth_left_leaveFeedback_share">Оценка</span>

                <table cellspacing="5" width="100%" class="rating_table">
                    <tr>
                        <td valign="top" style="display: none">
                            <code class="html">
                            &lt;input name="star1" type="radio" class="star"/&gt;
                            &lt;input name="star1" type="radio" class="star"/&gt;
                            &lt;input name="star1" type="radio" class="star"/&gt;
                            &lt;input name="star1" type="radio" class="star"/&gt;
                            &lt;input name="star1" type="radio" class="star"/&gt;
                            </code>
                        </td>
                        <td valign="top" width="180">
                            <input name="Review[rating]" value="1" type="radio" class="star"/>
                            <input name="Review[rating]" value="2" type="radio" class="star"/>
                            <input name="Review[rating]" value="3" type="radio" class="star"/>
                            <input name="Review[rating]" value="4" type="radio" class="star"/>
                            <input name="Review[rating]" value="5" type="radio" class="star"/>
                        </td>
                    </tr>
                </table>

                </span><br><br>
                <?= Html::error($review, 'title', ['class'=>'error'])?><br>
                <?= Html::activeInput('text', $review, 'title', ['placeholder'=>'Заголовок отзыва'])?><br>

                <?= Html::error($review, 'comment', ['class'=>'error'])?><br>
                <?= Html::activeTextarea($review, 'comment', ['placeholder'=>'Ваше мнение о компании','data'=>'elastic'])?><br>
                <?= Html::submitButton('Оставить отзыв', ['id'=>'leave_feedback_button'])?>
                <?= Html::error($review, 'mt_rand', ['class'=>'error'])?><br>
                <?= Html::endForm()?>
            </div>
        </div>
    </section>
    <!-- <section class="content_sec_right content_fifth_right">
        <div class="content_sec_right_getPresent pad-hidden mobile_hidden">
            <img src="/bluetheme/img/present-book_blue.svg" alt="" width="195" height="140">
            <p class="content_sec_right_getPresent_title">
                Оформи <br>КАСКО и ОСАГО получи 2 500 <span class="rubl">&#8399;</span> в подарок
            </p>
            <a class="content_sec_right_getPresent_btn" href="">Получить подарок</a>
        </div>
    </section>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript">
        var idNum = 0, data = 'elastic';
        $('body').on('keyup', 'textarea[data^="'+data+'"]', function(){
        if($(this).attr('data')==''+data+''){$(this).attr({style:'overflow:hidden;'+$(this).attr('style')+'',data:''+$(this).attr('data')+''+idNum+''});idNum++;}
        tData = $(this).attr('data');
        if($('div[data="'+tData.replace(''+data+'','clone')+'"]').size()==0){
        attr = 'style="display:none;padding:'+$(this).css('padding')+';width:'+$(this).css('width')+';min-height:'+$(this).css('height')+';font-size:'+$(this).css('font-size')+';line-height:'+$(this).css('line-height')+';font-family:'+$(this).css('font-family')+';white-space:'+$(this).css('white-space')+';word-wrap:'+$(this).css('word-wrap')+';letter-spacing:0.2px;" data="'+tData.replace(''+data+'','clone')+'"';
        clone = '<div '+attr+'>'+$(this).val()+'</div>';
        $('body').prepend(clone);
        idNum++;
        }else{
        $('div[data="'+tData.replace(''+data+'','clone')+'"]').html($(this).val());
        $(this).css('height',''+$('div[data="'+tData.replace(''+data+'','clone')+'"]').css('height')+'');
        }
        });



       console.log($('ul#ui-id-1'));


    </script>
</main>
<?php if(Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-green" role="alert">
            <script type="text/javascript"> $('main').remove(); </script>
            <p> <?= $this->render('/addreview/success')?></p>
        </div>
   
    <?php elseif(Yii::$app->session->hasFlash('confirm')): ?>
        <div class="alert alert-green" role="alert">
            <script type="text/javascript"> $('main').remove(); </script>
            <p> <?=  $this->render('/addreview/confirm')?></p>
        </div>
    
    <?php elseif(Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-red" role="alert">
            <p> <?php ?></p>
        </div>
    
<?php endif; ?>