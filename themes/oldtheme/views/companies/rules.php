
<?php if ($is_admin): ?>
    <div class="edit_rules_btn_block">
        <button class="edit_rules_btn">Редактировать</button>
    </div>
    <div class="edit_rules_block" style="display:none">
        <textarea id="edit_rules_textarea"><?= $html_rules ?></textarea>
    </div>
<?php endif; ?>
<div class="olit_content show_rules_block">
    <?= $html_rules ?>
</div>
