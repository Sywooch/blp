<?php
$this->title = "$descr » 711.ru - Независимый портал о страховании";
?>
<div>

    <div style="padding-left: 10px">
        <div class="speedbar">
            <span id="olit-speedbar">
                <a href="http://711.ru/">711.ru</a> » <?= $descr ?>
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 no-padding-right">

             <?php
            if ((isset($pages[0]['type'])) &&
                    (($pages[0]['type'] == 1 ) ||
                    ($pages[0]['type'] == 2 ))):
               echo '<div style="width: 330px; margin-bottom: -40px; margin-top: 0px">';
                switch ($pages[0]['type']):
                    case 1:
                        echo '<script src="//f.sravni.ru/f/apps/build/widgets/sravni-widgets.js"></script>';
                        echo '<sravni-micro-widget type="osago" size="370px" partner="711.ru"></sravni-micro-widget>';
                        break;
                    case 2:
                        echo '<script src="//f.sravni.ru/f/apps/build/widgets/sravni-widgets.js"></script>';
                        echo '<sravni-micro-widget type="kasko" size="370px" partner="711.ru"></sravni-micro-widget>';
                        break;
                endswitch;
                echo '</div>';
             endif;
             
                ?>

            <div id="olit-content">
                <div class="basecont">
                    <div class="dpad">
                        <h1 style="" class="heading">
                            <span id="news-title">
                                <span id="selection_index1" class="selection_index">

                                </span><?= $descr ?>
                            </span>
                        </h1>
                        <div style="    margin-left: 20px;margin-top: 5px; margin-bottom: 5px;"><i class="fa fa-eye"></i><?= $views ?></div>
                        <div class="clr"></div>
                        <script charset="utf-8" src="//yandex.st/share/share.js" type="text/javascript"></script>
                        <div data-yasharequickservices="vkontakte,facebook,twitter" data-yashareTitle="<?= $descr ?> | 711.ru" data-yasharetype="none" data-yasharel10n="ru" class="yashare-auto-init" style="margin:0px 10px;"></div>
                        <?= str_replace("\\\"", "\"", $template) ?>
                    </div>
                    <div class="clr"></div>
                    <div data-yasharequickservices="vkontakte,facebook,twitter" data-yashareTitle="<?= $descr ?> | 711.ru" data-yasharetype="none" data-yasharel10n="ru" class="yashare-auto-init" style="margin:0px 10px;"></div>
                </div>
            </div>
        </div> 
        <div class="col-md-4">
            <?php
            if ((isset($pages[0]['type'])) &&
                    (($pages[0]['type'] == 1 ) ||
                    ($pages[0]['type'] == 2 ))):
               echo '<div style="width: 330px; margin-bottom: -60px; margin-top: 0px">';
                switch ($pages[0]['type']):
                    case 2:
                        echo <<<EOD
<script src="//f.sravni.ru/f/apps/build/widgets/sravni-widgets.js"></script>
<sravni-micro-widget type="kasko" size="330" partner="711.ru"><link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet"><style>sravni-micro-widget{text-align: center;display: block;position:relative}a.sravni-dl{font: 300 14px 'Open Sans', sans-serif; max-width:330px; display:inline-block; color: #a7a7a7; text-decoration: none;border-bottom:1px solid #a7a7a7;}</style>
<a href="https://www.sravni.ru/kasko/?utm_source=711.ru&utm_medium=microwidget_links&utm_campaign=microwidget_kasko_711.ru&utm_content=logo" target="_blank" class="sravni-dl">Другие варианты страхования на sravni.ru</a></sravni-micro-widget>
EOD;
                        
                        break;
                    case 1:
                        echo <<<EOD
<script src="//f.sravni.ru/f/apps/build/widgets/sravni-widgets.js"></script>
<sravni-micro-widget type="osago" size="330" partner="711.ru"><link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet"><style>sravni-micro-widget{text-align: center;display: block;position:relative}a.sravni-dl{font: 300 14px 'Open Sans', sans-serif; max-width:330px; display:inline-block; color: #a7a7a7; text-decoration: none;border-bottom:1px solid #a7a7a7;}</style>
<a href="https://www.sravni.ru/osago/?utm_source=711.ru&utm_medium=microwidget_links&utm_campaign=microwidget_osago_711.ru&utm_content=logo" target="_blank" class="sravni-dl">Другие варианты страхования на sravni.ru</a></sravni-micro-widget>
EOD;
                        
                        break;
                endswitch;
                echo '</div>';
             endif;
             
                ?>
                 
           
            <?php if (!empty($pages)): ?>

         
                    <div style="font-size: 15px; margin-top: 0px; position: inherit;" id="left_block_middle_head">Статьи по теме:<?= $type ?></div>
                    <div id="left_block_comment_content">
                        <ul id="static_pages_list">
                            <?php
//                            var_dump($pages);
//                            die();
                            ?>
                            <?php foreach ($pages as $page) : ?>
                                <li>
                                    <?php if ($page['current']): ?>
                                        <?= $page['descr'] ?>
                                    <?php else: ?>
                                        <a href="/<?= $page['name'] ?>.html"><?= $page['descr'] ?></a>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <br>
              



            


            <!------ если Путешествия или Имущество показываем баннер ------>
            <div style="margin-bottom: 10px;">
                <?/*php
                switch ($pages[0]['type']):
                    case 1:
                        
                    case 2:
                    case 3:
                    case 11:
                    case 12:
                        $link = '';//'VZR.JPG';
                        $link_out = '';//https://online.binins.ru/PARTNERS/VZROnLineN.aspx?ID_PARTNER=62434fc8-0f28-4dc2-adaa-b5a40344b280';
                        break;
                    case 8:
                    case 9:
                    case 10:
                        $link = '';//'property.JPG';
                        $link_out = '';//'https://online.binins.ru/PARTNERS/FlatOnLineN.aspx?ID_PARTNER=62434fc8-0f28-4dc2-adaa-b5a40344b280';
                        break;
                endswitch;
                */?>
                <div>
                   <!----- <a href = "<?//= $link_out ?>" />--->

                   <!----- <img src ="/olitimages/banners/<?//= $link ?>" />---->
                    </a>
                </div>
            <?php endif; ?>
            <!----- конец баннера ---->
             </div>

            <div>  

                <?php if (!empty($news)): ?>
                    <div style="font-size: 15px" id="left_block_middle_head">Новости по теме: <?= $type ?></div>
                <?php endif; ?>


                <?php foreach ($news as $new): ?>
                    <div id="left_block_comment_content">

                        <div style="border-bottom:1px dashed black;font-size:13px; margin-bottom: 12px; padding: 3px 0 8px 5px"> 

                            <div style="color:#999999;font-style: italic;">
                                <?= $new['date'] ?>
                                <i style="margin-left: 10px;" class="fa fa-eye"></i>
                                 <?=$new['count']?>
                            </div>
                            <a href="<?= $new['url'] ?>">
                                <?= $new['title'] ?> </a>

                        </div>

                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    $(document).ready(function() {
        $('.l-col').remove();  
});
</script>