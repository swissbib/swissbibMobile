<?php
function search($query, $epfbibonly=false, $offset=1, $language="en"){
	
	
	$sruQuery = new SruQuery();	
	
	
	if($epfbibonly=="on"){
		$pxml=$sruQuery->getResultsFromSearch($query, "Nebis", "E02", $offset);
	}
	else
	{
		$pxml=$sruQuery->getResultsFromSearch($query, "Nebis", "", $offset);
	}
	
	if($pxml->numberOfRecords==0)//no results
	{
		echo getMessage("noresults",$language);
	
		$spell_suggestion = $sruQuery->getSpellSuggestion($query);
		
		if($spell_suggestion!=False){
			echo getMessage("didyoumean",$language);			
			echo '<br />';
			echo '<br />';
			echo '<ul data-role="listview">';
			echo '<li>';
			echo '<a href="index.php?q='.$spell_suggestion.'&epfbibonly='.$epfbibonly.'">';
			echo $spell_suggestion;
			echo '</a>';
			echo '</li>'; 
		}
		else{
			echo getMessage("revisesearch",$language);
		}
	}
	else
	{
					
		echo "<p>";
		echo $pxml->numberOfRecords;
		echo getMessage("numberofresults",$language);
		echo "</p>";
		
		echo '<ul data-role="listview">';
					
		foreach ($pxml->records->record as $record) {
			$marc=$record->recordData->children('srw_marc',true);
			
			//echo $marc->asXML();
			
			echo '<li>';
			
			echo '<a href="index.php?id='.getControlField($marc,"001").'&epfbibonly='.$epfbibonly.'">';
			echo '<h3>';
			echo getMarcField($marc, '245', 'a');
			
			echo '</h3>';
			
			echo '<p><strong>';
			
			echo getMarcField($marc, '245', 'c');
			
			echo '</strong></p>';
			echo '<p>';
			
			
			echo getMarcField($marc, '260', 'c');
			echo ". ";
			
			
			
			echo '</p>';
			echo '</a>';
			echo '</li>';
		}			
		echo '</ul>';
		
		
		//"next records" button
		$next_record_number=$pxml->nextRecordPosition;
		if($next_record_number){
			echo '<br/><br/>
			<ul data-role="listview">
			<li>';
			echo '<a href="index.php?q='.$query.'&epfbibonly='.$epfbibonly.'&offset='.$next_record_number.'">';
			echo getMessage("next",$language);
			echo '</a></li>';
			echo '</ul>';
		}
	}
}

function getMessage($errorname,$language){
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
	return $messages[$errorname][$language];
}

?>
