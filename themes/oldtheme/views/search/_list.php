

 <div class="search-res">
    <div class="them-news-logo" style="background:white; min-height: 50px">
        <img class="logoComm" style="margin-right: 2px" src="<?=$model['photo']?>">
    </div>
        <div style="margin-right:300px">
          
                
            <div class="name_news_all">
                <a href="<?= $model['link'] ?>"> 
                        
                </a>
            <div>            
                <div>
                    <b><?= mb_substr($model['name'], 0, 100, 'utf8')?></b><br><?=mb_substr($model['descr'],0,150, 'utf8')?>
                    <a id="short-news" href="<?=$model['link'] ?>">читать далее...</a>
                </div>
                    
            </div>
        </div>
        </div>

 </div>
