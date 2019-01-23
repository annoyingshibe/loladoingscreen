<?php
function queryServer ($ip, $queryport) {
	$socket = @fsockopen("udp://".$ip, $queryport , $errno, $errstr, 1);

	stream_set_timeout($socket, 1);
	stream_set_blocking($socket, TRUE);
	fwrite($socket, "\xFF\xFF\xFF\xFF\x54Source Engine Query\x00");
	$response = fread($socket, 4096);
	@fclose($socket);

	$packet = explode("\x00", substr($response, 6), 5);
	$server = null;

	if (!empty($packet[0])) {
		$server = array();
		$server['name'] = $packet[0];
		$server['map'] = $packet[1];
		$server['game'] = $packet[2];
		$server['description'] = $packet[3];
		$inner = $packet[4];
		$server['players'] = ord(substr($inner, 2, 1));
		$server['playersmax'] = ord(substr($inner, 3, 1));
		$server['password'] = ord(substr($inner, 7, 1));
		$server['vac'] = ord(substr($inner, 8, 1));
	}

	return( $server );
}

$serverData = array();
if ($servers !== array('')) {
	foreach ($servers as $server) {
		$server = explode (":", $server);
		$queryResponse = queryServer ($server[0], $server[1]);
		if (!empty($queryResponse)) {
			array_push($serverData, $queryResponse);
		}
	}
}
?>
<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<p class="flow-text light"><span><i class="fa fa-server"></i> <?= $serversTitle ?></span></p>
				<table>
					<thead>
						<tr>
							<th>Server name</th>
							<th>Current map</th>
							<th>Players</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($serverData as $dataElement): ?>
							<tr><td><?= $dataElement['name'] ?></td><td><?= $dataElement['map'] ?></td><td><?= $dataElement['players'] ?>/<?= $dataElement['playersmax'] ?></td></tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
