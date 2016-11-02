<form action = "" method = "post" >
	<input type = "text" name = "region" value = "Москва и Московская обл"/>
	<input type = "text" name = "city" value = "Москва"/>
	<input type = "text" name = company_add[] value = "Айни Международная СК" />
	<input type = "text" name = company_add[] value = "Росгосстрах" />
	
	 <input type ='hidden' name ='_csrf' class = 'toPost'          value ='<?= Yii::$app->request->getCsrfToken() ?>' />
	<input type = "submit" value = "go" />
 </form>
<?php
print_r($data);