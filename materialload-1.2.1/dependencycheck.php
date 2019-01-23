<?php
require_once("data/config.php");
if (isset($_GET['forcecheck']) || ini_get("allow_url_fopen") == 0 || !is_writable('data/config.php') || !is_writable('data/steamapikey.php')): ?>
<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="dependencies/materialize/css/materialize.min.css"  media="screen,projection"/>
		<title>MaterialLoad</title>
		<?php include ('components/background.php'); ?>
	</head>
	<body class="grey lighten-4">
		<main id="main">
			<div class="row">
				<div class="col s12 m6 offset-m3">
					<div class="card-panel white">
						<div class="row">
							<p class="flow-text light center" style="font-size: 20px">There seems to be a problem with some of the dependencies of this script. Please correct the ones marked with red:</p>
							<table>
								<tbody>
									<tr>
										<td>allow_url_fopen</td>
										<td>
											<?php if (ini_get("allow_url_fopen") == 0): ?>
												<span class="red-text">off</span>
											<?php else: ?>
												<span class="green-text">on</span>
											<?php endif; ?>
										</td>
									</tr>
									<tr>
										<td>mysqli extension</td>
										<td>
											<?php if (function_exists('mysqli_connect') == false): ?>
												<span class="red-text">not installed</span>
											<?php else: ?>
												<span class="green-text">installed</span>
											<?php endif; ?>
										</td>
									</tr>
									<tr>
										<td>data/config.php</td>
										<td>
											<?php if (is_writable('data/config.php')): ?>
												<span class="green-text">writable</span>
											<?php else: ?>
												<span class="red-text">not writable</span>
											<?php endif; ?>
										</td>
									</tr>
									<tr>
										<td>data/steamapikey.php</td>
										<td>
											<?php if (is_writable('data/steamapikey.php')): ?>
												<span class="green-text">writable</span>
											<?php else: ?>
												<span class="red-text">not writable</span>
											<?php endif; ?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</main>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="dependencies/materialize/js/materialize.min.js"></script>
		<script type="text/javascript" src="components/centermain.js"></script>
	</body>
</html>
<?php die();
endif;
