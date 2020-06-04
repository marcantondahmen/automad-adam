<?php defined('AUTOMAD') or die('Direct access not permitted!'); ?>
<section <@~ if @{ :pagelistCount } > 1 @> class="am-stretched"<@ end @>>
	<div class="masonry masonry-large uk-margin-large-bottom">
		<@ foreach in pagelist ~@>
			<div class="masonry-item">
				<div class="uk-height-1-1 uk-panel uk-panel-box">
					<div class="masonry-content">
						<div class="uk-panel-title">
							<a href="@{ url }" class="nav-link">@{ title }</a>
							<div class="text-subtitle">
								<@ date.php @>
								<@ if @{ date } and @{ tags } @><br><@ end @>
								<@ tags.php @>
							</div>
						</div>
						<@~ set_imageteaser_variable.php @>
						<@ if @{ :imageTeaser } ~@>
							<div class="uk-panel-teaser">
								<a href="@{ url }"><img src="@{ :imageTeaser }"></a>
							</div>
						<@~ end @>
						<@~ set_teaser_variable.php @>
						<p class="content uk-margin-bottom-remove">@{ :teaser }</p>
						<@ more.php @>
					</div>
				</div>	
			</div>
		<@ else @>
			<div class="masonry-item">
				<h4 class="masonry-content">
					@{ notificationNoSearchResults | def ('No Pages Found') }
				</h4>
			</div>
		<@~ end @>
	</div>
</section>