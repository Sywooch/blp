<main class="regions clear">
<div style="font-size:14px;">
    <div>
        <a href="/">711</a> &gt;&gt; <a href="/regions">Регионы России</a>
    </div>
</div>
    <h3 class="regions_title">
        Регионы России - список филиалов страховых компаний
    </h3>
    <div class="regions_list clear">
    	<div class="regions_list_block">
			<?php for ($i = 0; $i < ceil($count / 3); $i++) {
	            ?>
                    <a class="regions_item" href ='/region/<?= isset($regions[$i]['id']) ? $regions[$i]['id'] : '' ?>'>
                        <?= isset($regions[$i]['region']) ?  $regions[$i]['region'] : '' ?>
                    </a>
	        <?php } ?>
		</div>
		<div class="regions_list_block">
		        <?php for ($i = ceil($count / 3); $i < ceil($count * 2 / 3); $i++) {
		            ?>
	                    <a class="regions_item" href ='/region/<?= isset($regions[$i]['id']) ? $regions[$i]['id'] : '' ?>'>
	                        <?= isset($regions[$i]['region']) ?  $regions[$i]['region'] : '' ?>
	                    </a>
		        <?php } ?>
		</div>
		<div class="regions_list_block">
		        <?php for ($i = ceil($count * 2 / 3); $i < ceil($count * 3 / 3); $i++) {
		            ?>
	                    <a class="regions_item" href ='/region/<?= isset($regions[$i]['id']) ? $regions[$i]['id'] : '' ?>'>
	                        <?= isset($regions[$i]['region']) ?  $regions[$i]['region'] : '' ?>
	                    </a>
		        <?php } ?>
		</div>
    </div>
</main>