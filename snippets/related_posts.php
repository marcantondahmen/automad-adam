<?php defined('AUTOMAD') or die('Direct access not permitted!'); ?>
<@~ newPagelist { type: 'related', sort: @{ sortRelatedPages | def ('date desc') } } @>	
<@~ if @{ :pagelistCount } @>
	<@ related.php @>
	<@ ../blocks/pagelist/blog.php @>
<@ end ~@>
	