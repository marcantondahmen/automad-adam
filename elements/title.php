<?php defined('AUTOMAD') or die('Direct access not permitted!'); ?>
<@~ prev_next.php ~@>
<@ if not @{ checkboxHideTitle } ~@>
	<div class="am-block">
		<h1 class="uk-margin-bottom-remove uk-margin-top-remove">
			@{ title }
		</h1>	
		<div class="uk-margin-bottom">
			<@ subtitle.php @>
		</div>
	</div>
<@~ end @>