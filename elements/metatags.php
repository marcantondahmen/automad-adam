<?php defined('AUTOMAD') or die('Direct access not permitted!'); ?>
<?php if (substr(AM_VERSION, 0, 1) == '1') { ?>
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
<?php } else { ?>
	<@ Automad/MetaTags { ogTitle: false, ogImage: @{ ogImage } } @>
<?php } ?>
