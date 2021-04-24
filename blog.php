<?php defined('AUTOMAD') or die('Direct access not permitted!'); ?>
<@ elements/header.php @>
	<div class="content uk-block">
		<@ elements/content.php @>
		<@ elements/pagelist_config.php @>
		<@~ if not @{ checkboxHideFilters } @>
			<div id="list" class="am-block buttons-stacked uk-margin-small-bottom">
				<@ elements/filters.php @>
				<@ elements/clear_search.php @>
			</div>
		<@ end ~@>
		<@ blocks/pagelist/blog.php @>
		<@ elements/pagination.php @>
	</div>
<@ elements/footer.php @>