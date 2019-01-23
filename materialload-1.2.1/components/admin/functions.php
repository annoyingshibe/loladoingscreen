<?php
function isAuthorized($steamID) {
	global $adminSteamID, $authorizedUsers;
  if (!empty($steamID)) {
    if ($steamID === $adminSteamID || in_array($steamID,$authorizedUsers)) {
  		return true;
  	} else {
  		return false;
  	}
  }
}
?>
