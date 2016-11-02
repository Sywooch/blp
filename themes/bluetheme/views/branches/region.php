<main class="regions clear">
<div style="font-size:14px;">
    <div>
        <a href="/">711</a> &gt;&gt; <a href="/regions">Регионы России</a> &gt;&gt; <?=$region?>
    </div>
</div>
    <h3 class="regions_title regions_title_just"><?=$region?> - список филиалов страховых компаний по городам</h3>

		<div class="regions_list_block">
			<?php for ($i = 0; $i < ceil($count / 3); $i++) {
	            ?>
	                <a class="regions_item" href ='/city/<?= isset($cities[$i]['id']) ? $cities[$i]['id'] : '' ?>'>
	                    <?= isset($cities[$i]['city']) ?  $cities[$i]['city'] : '' ?>
	                </a>
	        <?php } ?>
		</div>
		<div class="regions_list_block">
		        <?php for ($i = ceil($count / 3); $i < ceil($count * 2 / 3); $i++) {
		            ?>
	                    <a class="regions_item" href ='/city/<?= isset($cities[$i]['id']) ? $cities[$i]['id'] : '' ?>'>
	                        <?= isset($cities[$i]['city']) ?  $cities[$i]['city'] : '' ?>
	                    </a>
		        <?php } ?>
		</div>
		<div class="regions_list_block">
		        <?php for ($i = ceil($count * 2 / 3); $i < ceil($count * 3 / 3); $i++) {
		            ?>
	                    <a class="regions_item" href ='/city/<?= isset($cities[$i]['id']) ? $cities[$i]['id'] : '' ?>'>
	                        <?= isset($cities[$i]['city']) ?  $cities[$i]['city'] : '' ?>
	                    </a>
		        <?php } ?>
		</div>
<?php
