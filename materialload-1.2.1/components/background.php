<?php
if (!filter_var($background, FILTER_VALIDATE_URL) && !file_exists('./'.$background) && file_exists('../'.$background)) {
	$bg = '../'.$background;
} else {
	$bg = $background;
}
if (strpos($bg, '.webm') !== false || filter_var($bg, FILTER_VALIDATE_URL) && get_headers($bg, 1)['Content-Type'] === 'video/webm'): ?>
	<style>#backgroundVideo { position: fixed; right: 0; bottom: 0; min-width: 100%; min-height: 100%; z-index: -1; }</style>
	<video autoplay muted loop id="backgroundVideo"><source src="<?= $bg ?>" type="video/webm"></video>
	<?php return; ?>
<?php endif; ?>

<style>
body:before {
	content: " ";
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	<?php if ($backgroundFade): ?>
		opacity: .75;
	<?php else: ?>
		opacity: 1;
	<?php endif; ?>
	background: url(<?= $bg ?>) no-repeat center center fixed;
	-moz-background-size: cover;
	-webkit-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
	z-index: -1;
}

body {
	<?php if (!isset($_SESSION['steamid'])): ?>
		overflow: hidden;
	<?php endif; ?>
	<?php if ($backgroundFade): ?>
		animation: colorchange <?= $fadeTime ?>s; /* animation-name followed by duration in seconds*/
		-webkit-animation: colorchange <?= $fadeTime ?>s; /* Chrome and Safari */
		animation-iteration-count: infinite;
		-webkit-animation-iteration-count: infinite; /* Safari 4.0 - 8.0 */
	<?php endif; ?>
}

@keyframes colorchange {
	0%   {background-color: red;}
	25%  {background-color: yellow;}
	50%  {background-color: blue;}
	75%  {background-color: green;}
	100% {background-color: red;}
}
@-webkit-keyframes colorchange { /* Safari and Chrome */
	0%   {background-color: red;}
	25%  {background-color: yellow;}
	50%  {background-color: blue;}
	75%  {background-color: green;}
	100% {background-color: red;}
}
</style>
