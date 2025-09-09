<?php defined('AUTOMAD') or die('Direct access not permitted!'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if (substr(AM_VERSION, 0, 1) == '1') { ?>
		<@ metatags.php @>
	<?php } ?>
	<@ favicons.php @>
	<# 
	
	To make sure the following variables are always available in the dashboard, 
	they can be included in a comment block.
	
	@{ imageTeaser } 
	
	#>
	<link href="https://fonts.googleapis.com/css2?family=Fira+Mono&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&display=swap" rel="stylesheet">	
	<link href="/packages/@{ theme }/dist/adam.min.css" rel="stylesheet">
	<script src="/packages/@{ theme }/dist/adam.min.js"></script>
	<# Add optional header items. #>
	@{ itemsHeader }
</head>

<body class="@{ theme | sanitize } @{ :template | def(@{ template }) | sanitize }">
	<@ navbar.php @>
	<div class="uk-container uk-container-center navbar-push">
