<?php

function search($query, $network=false, $library=false, $offset=1, $language='en')
{
	$sruQuery = new SruQuery();	
	
	$pxml=$sruQuery->getResultsFromSearch($query, $network, $library, $offset);
		
	
	if ($pxml->numberOfRecords==0) { //no results
		echo getMessage('noresults',$language);
	
		$spell_suggestion = $sruQuery->getSpellSuggestion($query);
		
		if ($spell_suggestion!=False) {
			echo getMessage('didyoumean',$language);			
			echo '<br />';
			echo '<br />';
			echo '<ul data-role="listview">';
			echo '<li>';
			echo '<a href="index.php?q='.$spell_suggestion.'&network='.$network.'&library='.$library.'">';
			echo $spell_suggestion;
			echo '</a>';
			echo '</li>'; 
		} else {
			echo getMessage('revisesearch',$language);
		}
	} else {
		echo '<p>';
		echo $pxml->numberOfRecords;
		echo getMessage('numberofresults',$language);
		echo '</p>';
		echo "\n";
		
		echo '<ul data-role="listview">';
		echo "\n";
					
		foreach ($pxml->records->record as $record) {
			$marc=$record->recordData->children('srw_marc',true);
			
			//echo $marc->asXML();
			
			echo '<li>';
			
			echo '<a href="index.php?id='.getControlField($marc,"001").'&network='.$network.'&library='.$library.'">';
			echo '<h3>';
			echo getMarcField($marc, '245', 'a');
			
			echo '</h3>';
			
			echo '<p><strong>';
			
			echo getMarcField($marc, '245', 'c');
			
			echo '</strong></p>';
			echo "\n";
			echo '<p>';
			
			
			echo getMarcField($marc, '260', 'c');
			echo '. ';
			
			
			
			echo '</p>';
			echo "\n";
			echo '</a>';
			echo '</li>';
			echo "\n";
		}			
		echo '</ul>';
		echo "\n";
		
		
		//"next records" button
		$next_record_number=$pxml->nextRecordPosition;
		if ($next_record_number) {
			echo '<br/><br/>
			<ul data-role="listview">
			<li>';
			if ($library) { //to have library filter checkbox ticked
				echo '<a href="index.php?q='.$query.'&network='.$network.'&library='.$library.'&libraryfilter=on'.'&offset='.$next_record_number.'">';
			} else {
				echo '<a href="index.php?q='.$query.'&network='.$network.'&library='.$library.'&offset='.$next_record_number.'">';
			}
			echo getMessage('next',$language);
			echo '</a></li>';
			echo '</ul>';
		}
	}
}



?>
