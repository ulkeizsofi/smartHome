
<?php
include __DIR__."/translations.php";
function trans($id) {
	global $lang;
	$crtLang = getCurrentLanguage();
    return $lang[$id][$crtLang];
}
function etrans($id) {
	echo trans($id);
}

function getCurrentLanguage() {
	if(isset($_SESSION["crtLang"])) {
		$crtLang = $_SESSION["crtLang"];
	}
	else {
		$crtLang = "en";
		$_SESSION["crtLang"] = $crtLang;
	}
	return $crtLang;
}

?>
