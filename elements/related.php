<?php defined('AUTOMAD') or die('Direct access not permitted!'); ?>
<h3 class="am-block uk-margin-top uk-margin-small-bottom">
	<@ Automad/Bootstrap/Icon {
		icon: 'tag',
		w: '1em',
		h: '1em'
	} @>&nbsp;
	@{ labelRelated | def ('Related Pages') }
</h3>