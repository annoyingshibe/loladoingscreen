<form action="save.php" method="post">
	<div class="row">
		<div class="col s12 m6 offset-m3">
			<div class="card-panel white">
				<div class="row">
					<p class="flow-text light center" style="font-size:36px; margin-bottom: 0;">MaterialLoad configuration</p>
					<p class="flow-text light center" style="font-size:16px">Here you can configure MaterialLoad to your liking.</p>
				</div>
				<div class="divider"></div>
				<div class="row">
					<p class="flow-text light">Visuals</p>
					<div class="input-field col s6">
						<i class="material-icons prefix fa fa-file-image-o"></i>
						<input name="logo" type="text" class="validate" placeholder="logo.png" value="<?= $logo ?>">
						<label for="logo">Logo</label>
					</div>
					<div class="input-field col s6">
						<i class="material-icons prefix fa fa-picture-o "></i>
						<input name="background" type="text" class="validate" placeholder="bg.jpg" value="<?= $background ?>">
						<label for="background">Background</label>
					</div>
					<div class="col s4">
						<br>
						<div class="switch">
							<label>
							Enable fading background colors?
							<input name="backgroundFade" type="checkbox"<?php if ($backgroundFade) { echo 'checked="checked"'; } ?>>
							<span class="lever"></span>
							</label>
						</div>
					</div>
					<div class="input-field col s8">
						<i class="material-icons prefix fa fa-clock-o"></i>
						<input name="fadeTime" type="text" class="validate" value="<?= $fadeTime ?>">
						<label for="fadeTime">Background fade time (in seconds)</label>
					</div>
					<div class="input-field col s6">
						<select name="colorScheme">
							<option value="light" <?php if ($colorScheme=='light') { echo 'selected'; } ?>>Light</option>
							<option value="dark" <?php if ($colorScheme=='dark') { echo 'selected'; } ?>>Dark</option>
						</select>
						<label>Color scheme</label>
					</div>
					<div id="animationSandbox">
						<div class="input-field col s6">
							<select id="cardAnimation" name="cardAnimation">
								<option value="" <?php if ($cardAnimation=='') { echo 'selected'; } ?>>None</option>
								<option value="bounce" <?php if ($cardAnimation=='bounce') { echo 'selected'; } ?>>Bounce</option>
								<option value="flash" <?php if ($cardAnimation=='flash') { echo 'selected'; } ?>>Flash</option>
								<option value="pulse" <?php if ($cardAnimation=='pulse') { echo 'selected'; } ?>>Pulse</option>
								<option value="rubberBand" <?php if ($cardAnimation=='rubberBand') { echo 'selected'; } ?>>Rubber band</option>
								<option value="shake" <?php if ($cardAnimation=='shake') { echo 'selected'; } ?>>Shake</option>
								<option value="swing" <?php if ($cardAnimation=='swing') { echo 'selected'; } ?>>Swing</option>
								<option value="tada" <?php if ($cardAnimation=='tada') { echo 'selected'; } ?>>Tada</option>
								<option value="wobble" <?php if ($cardAnimation=='wobble') { echo 'selected'; } ?>>Wobble</option>
								<option value="jello" <?php if ($cardAnimation=='jello') { echo 'selected'; } ?>>Jello</option>
								<option value="jackInTheBox" <?php if ($cardAnimation=='jackInTheBox') { echo 'selected'; } ?>>Jack-in-the-box</option>
							</select>
							<label>Card animation</label>
						</div>
					</div>
				</div>
				<div class="divider"></div>
				<div class="row">
					<p class="flow-text light">Welcome card</p>
					<div class="input-field col s12">
						<i class="material-icons prefix fa fa-handshake-o"></i>
						<input name="welcomeMessage" type="text" class="validate" placeholder="Hey there, [USERNAME]!" value="<?= $welcomeMessage ?>">
						<label for="welcomeMessage">Welcome message</label>
					</div>
					<div class="col s12">
						<div class="switch">
							<label>
							Display SteamID?
							<input name="showSteamID" type="checkbox"<?php if ($showSteamID) { echo 'checked="checked"'; } ?>">
							<span class="lever"></span>
							</label>
						</div>
						<div class="switch">
							<label>
							Display DarkRP wallet?
							<input name="fetchDarkRPwallet" type="checkbox"<?php if ($fetchDarkRPwallet) { echo 'checked="checked"'; } ?>">
							<span class="lever"></span>
							</label>
						</div>
					</div>
				</div>
				<div class="divider"></div>
				<div class="row">
					<p class="flow-text light">DarkRP wallet MySQL</p>
					<div class="input-field col s3">
						<i class="material-icons prefix fa fa-usd"></i>
						<input name="currencySymbol" type="text" class="validate" value="<?= $currencySymbol ?>">
						<label for="currencySymbol">Currency symbol</label>
					</div>
					<div class="input-field col s6">
						<i class="material-icons prefix fa fa-arrows-h"></i>
						<input name="currencySymbolSide" type="text" class="validate" value="<?= $currencySymbolSide ?>">
						<label for="currencySymbolSide">Currency symbol side (left or right)</label>
					</div>
					<div class="input-field col s3">
						<i class="material-icons prefix fa fa-money"></i>
						<input name="fallbackWalletBalance" type="text" class="validate" value="<?= $fallbackWalletBalance ?>">
						<label for="fallbackWalletBalance">Fallback balance</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s3">
						<i class="material-icons prefix fa fa-globe"></i>
						<input name="servername" type="text" class="validate" value="<?= $servername ?>">
						<label for="servername">DB host</label>
					</div>
					<div class="input-field col s3">
						<i class="material-icons prefix fa fa-database"></i>
						<input name="dbname" type="text" class="validate" value="<?= $dbname ?>">
						<label for="dbname">DB name</label>
					</div>
					<div class="input-field col s3">
						<i class="material-icons prefix fa fa-user-o"></i>
						<input name="username" type="text" class="validate" value="<?= $username ?>">
						<label for="username">DB username</label>
					</div>
					<div class="input-field col s3">
						<i class="material-icons prefix fa fa-unlock-alt"></i>
						<input name="password" type="password" class="validate" value="<?= $password ?>">
						<label for="password">DB password</label>
					</div>
				</div>
				<div class="divider"></div>
				<div class="row">
					<p class="flow-text light">Introduction card</p>
					<div class="input-field col s12">
						<i class="material-icons prefix fa fa-info-circle"></i>
						<input name="introductionTitle" type="text" class="validate" value="<?= $introductionTitle ?>">
						<label for="introductionTitle">Introduction title</label>
					</div>
					<div class="input-field col s12">
						<textarea name="introductionText" class="materialize-textarea"><?= $introductionText ?></textarea>
						<label for="introductionText">Introduction text</label>
					</div>
				</div>
				<div class="divider"></div>
				<div class="row">
					<p class="flow-text light">Music</p>
					<div class="input-field col s12">
						<i class="material-icons prefix fa fa-youtube-play"></i>
						<textarea name="youtubeVideoIDs" placeholder="X5mcY8ecs8I&#013;&#010;60ItHLz5WEA&#013;&#010;1-xGerv5FOk" class="materialize-textarea"><?php $i = 0; $len = count($youtubeVideoIDs); foreach ($youtubeVideoIDs as $vidID) { echo $vidID; if ($i != $len - 1) { echo "&#013;&#010;"; } $i++; } ?></textarea>
						<label for="youtubeVideoIDs">Youtube video IDs (one per line)</label>
						<p class="range-field">
							<br><input type="range" name="youtubeVideoVolume" min="0" max="100" value="<?= $youtubeVideoVolume ?>" />
							<label for="youtubeVideoVolume">Music volume</label>
						</p>
					</div>
				</div>
				<div class="divider"></div>
				<div class="row">
					<p class="flow-text light">Rules card</p>
					<div class="input-field col s12">
						<i class="material-icons prefix fa fa fa-gavel"></i>
						<input name="rulesTitle" type="text" class="validate" value="<?= $rulesTitle ?>">
						<label for="rulesTitle">Rules title</label>
					</div>
					<div class="input-field col s12">
						<textarea name="rules" class="materialize-textarea"><?php $i = 0; $len = count($rules); foreach ($rules as $rule) { echo $rule; if ($i != $len - 1) { echo "&#013;&#010;"; } $i++;  } ?></textarea>
						<label for="rules">Rules (one per line)</label>
					</div>
				</div>
				<div class="divider"></div>
				<div class="row">
					<p class="flow-text light">Staff members card</p>
					<div class="input-field col s12">
						<i class="material-icons prefix fa fa-users"></i>
						<input name="staffMembersTitle" type="text" class="validate" value="<?= $staffMembersTitle ?>">
						<label for="staffMembersTitle">Staff members title</label>
					</div>
					<div class="input-field col s12">
						<textarea name="staffMembers" placeholder="76561198131926932,Founder&#013;&#010;76561198131926932,Developer" class="materialize-textarea"><?php $i = 0; $len = count($staffMembers); foreach ($staffMembers as $steamid64 => $rank) { if ($steamid64 != null) { echo $steamid64.",".$rank; if ($i != $len - 1) { echo "&#013;&#010;"; } $i++; } } ?></textarea>
						<label for="staffMembers">Staff member SteamIDs and ranks (one per line, comma-delimited)</label>
					</div>
				</div>
				<div class="divider"></div>
				<div class="row">
					<p class="flow-text light">Servers card</p>
					<div class="input-field col s12">
						<i class="material-icons prefix fa fa-server"></i>
						<input name="serversTitle" type="text" class="validate" value="<?= $serversTitle ?>">
						<label for="serversTitle">Servers title</label>
					</div>
					<div class="input-field col s12">
						<textarea name="servers" placeholder="127.0.0.1:27015" class="materialize-textarea"><?php $i = 0; $len = count($servers); foreach ($servers as $server) { echo $server; if ($i != $len - 1) { echo "&#013;&#010;"; } $i++; } ?></textarea>
						<label for="servers">Server IP addresses and ports (one per line)</label>
					</div>
				</div>
				<div class="divider"></div>
				<div class="row">
					<p class="flow-text light">Card ordering</p>
					<input hidden name="cardOrdering"></input>
					<div class="col s12">
						<ul class="collection" id="cardOrdering">
						  <?php
						  if (!isset ($cardOrdering)) { $cardOrdering = array ('welcome'=>true,'introduction'=>true,'staff'=>true,'rules'=>true,'servers'=>true,'download'=>true); }
						  foreach ($cardOrdering as $cO => $cOenabled) {
						  echo'
						  <li class="collection-item" data-name="'.$cO.'" data-enabled="'.$cOenabled.'">';
							if ($cO!=='download') {
								echo ucfirst($cO);
							} else {
								echo 'Download status';
							}
							echo'<div class="switch right">
									<label>
									<input id="'.$cO.'Enabled" type="checkbox"';if ($cOenabled) { echo 'checked="checked"'; } echo'>
									<span class="lever"></span></label>
								</div>
						  </li>';
						  }
						  ?>
						</ul>
					</div>
				</div>
				<div class="divider"></div>
				<div class="row">
					<p class="flow-text light tooltipped" data-tooltip="Other users who can configure MaterialLoad.">Authorized users</p>
					<div class="input-field col s12">
						<textarea name="authorizedUsers" placeholder="76561198131926932" class="materialize-textarea"><?php $i = 0; $len = count($authorizedUsers); foreach ($authorizedUsers as $aU) { echo $aU; if ($i != $len - 1) { echo "&#013;&#010;"; } $i++; } ?></textarea>
						<label for="authorizedUsers">Authorized SteamIDs (one per line)</label>
					</div>
				</div>
				<div class="divider"></div>
				<div class="center">
					<div class="row">
						<br>
						<button onclick="treatFormsAsUnchanged();" class="waves-effect waves-light btn" type="submit" name="action"><i class="material-icons left fa fa-floppy-o"></i>Save</button>
						<a href=".." target="blank" class="waves-effect waves-light btn"><i class="material-icons left fa fa-eye"></i>Preview</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../dependencies/Sortable/Sortable.min.js"></script>
<script>
	function testAnim(x) {
		$('#animationSandbox').removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			$(this).removeClass();
		});
	};
	$(document).ready(function() {
		$('select').formSelect();
		$('.tooltipped').tooltip();
		$('#cardAnimation').change(function(){
			testAnim($(this).val());
		});
	});

	var cardOrdering = document.getElementById('cardOrdering');
	var cardOrderingSortable = Sortable.create(cardOrdering, { group: "cardOrdering" });

	$('form').on('submit', function(){
		var cardOrderingArrayString = "";
		var collectionItemLength = $('.collection-item').length;
		$('.collection-item').each(function(index, item) {
			cardOrderingArrayString = cardOrderingArrayString.concat(("'"+$(item).attr('data-name')+"'=>"+$('#'+$(item).attr('data-name')+'Enabled').prop('checked')));
			 if (index !== collectionItemLength - 1) {
				 cardOrderingArrayString = cardOrderingArrayString.concat(',');
			 }
		});
		$('input[name=cardOrdering]').val(cardOrderingArrayString);
		$.post($(this).attr('action'), $(this).serialize(), function(response){
			if (response.success == true) {
				M.toast({html: 'Saving successful.'})
			} else {
				M.toast({html: 'Saving failed.'})
			}
	  },'json');
	  return false;
	 });

	var textAreasChanged;
	treatFormsAsUnchanged ();
	function treatFormsAsUnchanged() {
	   textAreasChanged = false;
	}

	$('textarea').on('input propertychange paste', function() {
		textAreasChanged = true;
	});
	$('form').on('input propertychange paste', function() {
		textAreasChanged = true;
	});

	$(window).bind('beforeunload', function(e){
		if (textAreasChanged == true) {
			return true;
		} else {
			e=null;
		}
	});
</script>
