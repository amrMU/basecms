<?php if($ad->type_ad == 'own'): ?>
	<span class="tag"><a href="#0">تمليك </a></span>
<?php elseif($ad->type_ad == 'rent'): ?>
	<span class="tag"><a href="#0">تأجير</a></span>
<?php elseif($ad->type_ad == 'purchase'): ?>
	<span class="tag"><a href="#0">شراء</a></span>
<?php elseif($ad->type_ad == 'other'): ?>
	<span class="tag"><a href="#0">اخري</a></span>
<?php endif; ?>