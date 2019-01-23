<?php if ($staffMembers != ""): ?>
	<div class="card">
		<div class="card-content">
			<p class="flow-text light center"><i class="fa fa-users"></i> <?= $staffMembersTitle ?></p>
			<ul>
			<?php
			foreach ($staffMembers as $steamid64 => $rank):
				foreach ($steamAPIresponse['response']['players'] as $steamAPIresponseObj) {
					if ($steamAPIresponseObj['steamid'] == $steamid64) {
						$staffMemberSteamInfo = $steamAPIresponseObj;
						break;
					}
				}
				if (!empty($staffMemberSteamInfo)):
					if (!empty($rank)) {
						$rank = ' | '.$rank;
					}
				?>
					<li class="grey <?php if ($colorScheme=='dark') { echo 'darken-3'; } else { echo 'lighten-2'; } ?>" style="height: 50px; border-radius: 50px; -moz-border-radius: 50px;">
						<img class="left" height="50px" style="border-radius: 50px; -moz-border-radius: 50px;" src="<?= $staffMemberSteamInfo['avatarmedium'] ?>">
						<p class="flow-text light center" style="position: relative; top: 50%; -ms-transform: translateY(-50%); -webkit-transform: translateY(-50%); transform: translateY(-50%);"><?= $staffMemberSteamInfo['personaname'].$rank ?></p>
					</li>
					<br>
				<?php endif; ?>
			<?php endforeach; ?>
			</ul>
		</div>
	</div>
<?php endif;
