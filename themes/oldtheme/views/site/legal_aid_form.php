<?
$this->title = "Юридическая помощь » 711.ru - Независимый портал о страховании";
?>
<div style="float:left;width:641px; height: auto;">


                                        <div id="olit-content"><h2 class="heading">Юридическая помощь</h2>
<div style="text-align:justify;padding:20px;">
У вас есть вопрос по страхованию?																												
<br><br>																										
<u>Хотите разобраться в том:</u><br>																													
	 - что на самом деле деле написано в пункте Правил страхования или страхового полиса?<br>																											
	 - обоснованно ли страховая компания отказывает вам выплате?							<br>																					
	 - как правильно составить письмо или претензию страховщику?									<br>																			
	 - какой порядок действий нужно соблюдать при наступлении страхового случая?							<br>																					
	 - где получать справки из компетентных органах и как эти справки должны выглядеть?								<br>																				
	 - актуален ли закон, на который ссылается страховая компания?	<br>	<br>																											
																												
Задайте его профессиональному юристу через наш портал 711.ru	<br>																												
И получите письменную консультацию совершенно бесплатно.	<br>		<br>																											
																												
<b>Как это работает?</b>	<br>																												
 																												
1	Вы отправляете свой вопрос на электронный адрес: <a href="mailto:info@pravx.ru">vopros-uristu@711.ru</a> 	<br>																											
	Важно, чтобы ваш вопрос был по страхованию. 	<br>	<br>																											
																												
2	Юрист изучает ваш вопрос, мониторит соответствующие законы и нормативные акты,	<br>																											
	не забывает и про судебную практику. 										<br>																		
	После этого готовит письменный ответ на ваш вопрос (не менее 1 страницы).	<br>	<br>																											
																												
3	Вы получаете письменный ответ юриста себе на электронный адрес, который указали 	<br>																											
	при отправке вопроса, в течение 1 рабочего дня.									<br>	<br>																			
																												
<u>В данный момент вы можете получить юридическую консультацию по следующим видам страхования:</u><br>																													
 - ОСАГО																				<br>									
 - КАСКО																				<br>									
 - личное страхование (НС, ДМС)															<br>														
 - страхование имущества (как физических лиц, так и юридических)						<br>																							


</div></div>
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