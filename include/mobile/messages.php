<?php
function getMessage($messageKey,$language){
	$messages["didyoumean"]["fr"]="Essayez avec : ";
	$messages["didyoumean"]["en"]="Did you mean : ";
	$messages["noresults"]["fr"]="Pas de résultats. ";
	$messages["noresults"]["en"]="No results. ";
	$messages["numberofresults"]["fr"]=" résultats :";
	$messages["numberofresults"]["en"]=" results :";
	$messages["revisesearch"]["fr"]="Modifiez votre recherche.";
	$messages["revisesearch"]["en"]="Revise your search.";
	$messages["next"]["fr"]="Suivant...";
	$messages["next"]["en"]="Next results...";
	
	
	
	
	return $messages[$messageKey][$language];
}

?>