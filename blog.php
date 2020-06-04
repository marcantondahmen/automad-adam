<?php defined('AUTOMAD') or die('Direct access not permitted!'); ?>
<@ snippets/header.php @>
	<div class="content uk-block">
		<@ snippets/content.php @>
		<@ snippets/pagelist_config.php @>
		<@~ if not @{ checkboxHideFilters } @>
			<div id="list" class="buttons-stacked">
				<@ snippets/filters.php @>
				<@ snippets/clear_search.php @>
			</div>
		<@ end ~@>
		<@ snippets/pagelist_blog.php @>
		<@ snippets/pagination.php @>
	</div>
<@ snippets/footer.php @>