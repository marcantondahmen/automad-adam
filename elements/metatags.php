<?php defined('AUTOMAD') or die('Direct access not permitted!'); ?>
<title>@{ metaTitle | def('@{ sitename } / @{ title | def ("404") }') }</title>
<@ set_teaser_variable.php @>
<@ set { :description: @{ metaDescription | def(@{ :teaser | stripTags }) } } @>
<@ Automad/MetaTags { 
	description: @{ :description },
	ogTitle: @{ metaTitle | def('@{ sitename } / @{ title | def ("404") }') },
	ogDescription: @{ :description },
	ogType: 'website',
	ogImage: @{ 
			ogImage | 
			def('@{ +main | findFirstImage }') | 
			def('*.jpg, *.png, *.gif, /shared/*.jpg, /shared/*.png, /shared/*.gif') 
		}
} @>
