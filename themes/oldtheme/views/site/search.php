<?
$this->title = "Поиск » 711.ru - Независимый портал о страховании";
?>
<div> 
    <div id="newsspeedbar" style="float:left;width:641px;">

        <div style="padding-left: 10px">
            <div class="speedbar"><span id="olit-speedbar"><a href="http://711.ru/">711.ru</a> » Поиск по сайту</span></div>
        </div>
    </div>
    <div style="float:left;width:641px; height: auto;">
        <div id="olit-content"><div class="dpad radial infoblock">
            <h1 class="heading">Поиск по сайту</h1>
            <div class="searchtable" name="searchtable" id="searchtable">
                <form method="post" action="http://711.ru/index.php?do=search" id="fullsearch" name="fullsearch">
                    <input type="hidden" value="search" id="do" name="do">
                    <input type="hidden" value="search" id="subaction" name="subaction">
                    <input type="hidden" value="0" id="search_start" name="search_start">
                    <input type="hidden" value="0" id="full_search" name="full_search">
                    <input type="hidden" value="1" id="result_from" name="result_from">
                    <table cellspacing="0" cellpadding="4" width="100%">
                        <tbody>
                            <tr>
                                <td class="search">
                                    <div style="margin:10px;">
                                        <input type="text" style="width:250px" class="textin" value="" id="searchinput" name="story"><br><br>
                                        <input type="button" onclick="javascript:list_submit(-1); return false;" value="Начать поиск" id="dosearch" name="dosearch" class="bbcodes">
                                        <input type="button" onclick="javascript:full_submit(1); return false;" value="Расширенный поиск" id="dofullsearch" name="dofullsearch" class="bbcodes">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
	</div>
    </div>
</div> 
<div style="float:right;width:290px;margin-top:-35px; ">
    <div>
        <div id="left_block_middle_head">КОММЕНТАРИИ</div>
        <div id="left_block_comment_content">
            <? foreach($lastComments as $comment): ?>
            <div style="border-bottom:1px dashed black;font-size:12px; margin-bottom: 12px;">
                <div style="padding:5px;">
                    <div style="color:#999999;font-style: italic;">
                        <?= $comment['date'] ?>                           
                    </div>
                    <div id="user_left_block">
                        <a class="underline" href="mailto:"><?= $comment['name'] ?></a>
                    </div>
                    <div id="comment_left_block">
                        <?= $comment['text'] ?>
                        <a href="<?= $comment['url'] ?>">→</a>
                    </div>
                    <div style="padding-top:4px;text-align:justify;">
                        К новости: <br> <a href="<?= $comment['url'] ?>" style="text-align: left">
                        <?= $comment['new_title'] ?></a>
                    </div>
                </div>
            </div>
            <? endforeach; ?>
        </div>
    </div>
</div>