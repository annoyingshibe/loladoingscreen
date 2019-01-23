<?php if ($introductionText != null || $introductionTitle != null): ?>
<div class="card">
	<div class="card-content">
		<?php if ($introductionTitle != null): ?>
			<p class="flow-text light center"><i class="fa fa-info-circle"></i> <?= $introductionTitle ?></p>
		<?php endif; ?>
		<p class="center"><i class="fa fa-gamepad"></i><span id="gamemode"> Gamemode</span>&emsp;<i class="fa fa-map"></i><span id="mapname"> Map</span></p>
		<?php if ($introductionText != null): ?>
			<blockquote><?= $introductionText ?></blockquote>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>
