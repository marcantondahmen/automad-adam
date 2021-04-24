<?php defined('AUTOMAD') or die('Direct access not permitted!'); ?>
<@~ if not @{ checkboxHidePrevNextNav } @>
	<@~ newPagelist { type: 'siblings' } @>
	<@~ if @{ :pagelistCount } @>
		<nav class="prev-next">
			<@ with prev ~@>
				<a href="@{ url }" class="nav-link prev" title="@{ title }" data-uk-tooltip="{pos:'right',animation:true}">
					<@ Automad/Bootstrap/Icon {
						icon: 'arrow-left',
						w: '1em',
						h: '1em'
					} @>
				</a>
			<@~ end @>
			<@~ with next ~@>
				<a href="@{ url }" class="nav-link next" title="@{ title }" data-uk-tooltip="{pos:'left',animation:true}">
					<@ Automad/Bootstrap/Icon {
						icon: 'arrow-right',
						w: '1em',
						h: '1em'
					} @>
				</a>
			<@~ end @>
		</nav>
	<@~ end @>
<@~ end @>