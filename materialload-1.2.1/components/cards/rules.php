<?php if ($rules[0] != null): ?>
	<div class="card">
		<div class="card-content">
			<p class="flow-text light center"><i class="fa fa-gavel"></i> <?= $rulesTitle ?></p>
			<ol style="font-size:16px">
				<?php foreach ($rules as $rule): ?>
					<li><?= $rule ?></li>
				<?php endforeach; ?>
			</ol>
		</div>
	</div>
<?php endif;
