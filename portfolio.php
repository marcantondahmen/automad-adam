<?php defined('AUTOMAD') or die('Direct access not permitted!'); ?>
<@ snippets/header.php @>
	<div class="content uk-block">
		<@ snippets/content.php @>
		<@ snippets/pagelist_config.php @>
		<@ if not @{ checkboxHideFiltersAndSort } @>
			<div id="list" class="am-block buttons-stacked uk-margin-small-bottom">
				<@ snippets/filters.php @>
				<@ snippets/sort.php @>
				<@ snippets/clear_search.php @>
			</div>
		<@ end @>
		<@ blocks/pagelist/portfolio.php @>
		<@ snippets/pagination.php @>
	</div>
<@ snippets/footer.php @>