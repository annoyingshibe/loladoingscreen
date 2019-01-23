<?php if ($welcomeMessage != null || $fetchDarkRPwallet || $showSteamID):
	foreach ($steamAPIresponse['response']['players'] as $steamAPIresponseObj) {
		if ($steamAPIresponseObj['steamid'] == $steamid) {
			$playerSteamInfo = $steamAPIresponseObj;
			break;
		}
	}
	?>
	<div class="card horizontal">
		<div>
			<p style="padding-left: 20%; padding-top: 5%;"><img height="100px" width="100px" style="border-radius: 100px; -moz-border-radius: 100px;" src="<?= $playerSteamInfo['avatarfull'] ?>"></p>
		</div>
		<div class="card-content" style="padding-left: 40px;">
			<p class="flow-text light center" style="font-size:30px">
				<?= str_replace("[USERNAME]", $playerSteamInfo['personaname'], $welcomeMessage) ?>
			</p>
			<?php
			if ($welcomeMessage != null) {
				if ($fetchDarkRPwallet || $showSteamID): ?>
					<div class="divider"></div>
				<?php endif;
			}
			if ($fetchDarkRPwallet):
				$conn = new mysqli($servername, $username, $password, $dbname);
				$sql = "SELECT wallet FROM darkrp_player WHERE uid=".$steamid." LIMIT 1";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$wallet = $row['wallet'];
					}
				} else {
					$wallet = $fallbackWalletBalance;
				}
				$conn->close();
				$wallet = number_format(floatval($wallet));
				if ($currencySymbolSide == "left") {
					$walletString = $currencySymbol.$wallet;
				} else {
					$walletString = $wallet.$currencySymbol;
				}
			?>
				<p class="flow-text light"><i class="fa fa-money"></i> <?= $walletString ?></p>
			<?php endif; ?>
			<?php if ($showSteamID): ?>
				<p class="flow-text light" style="font-size:17px"><i class="fa fa-steam"></i> <?= $steamid ?></p>
			<?php endif; ?>
		</div>
	</div>
<?php endif;
