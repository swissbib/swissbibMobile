<?php

//Default language is english. If there is "fr" in the first accepted language switch to french
$language="en";

if (isset($_SERVER["HTTP_ACCEPT_LANGUAGE"])){
	if (substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2)=="fr"){
		$language="fr";
	}
}
if ($language=="fr") {
	header("Location: ../fr/index.php");
}
else {
	header("Location: ../en/index.php");
}


?>
