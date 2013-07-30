<?php

function displayItem($id, $network=false, $library=false, $language='en')
{
	$sruQuery = new SruQuery();	
	$pxml=$sruQuery->getRecordFromIdWithHoldings($id);	
					
	$marc=$pxml->records->record[0]->recordData->children('srw_marc',true);								
	echo '<h3>';
	echo getMarcField($marc, '245', 'a');
	echo '</h3>';
	echo '<p>';
	echo getMarcField($marc, '245', 'c');
	echo '<br />';
	echo getMarcField($marc, '260', 'a');
	echo '. ';
	echo getMarcField($marc, '260', 'b');
	echo '. ';
	echo getMarcField($marc, '260', 'c');
	echo '<br />';
	echo getMarcField($marc, '250', 'a');
				
	//nebis system number
	$nebis_system_number=getNebisSystemNumber($marc);
	
	
	echo '<br />['.$nebis_system_number.']<br /><br />';
	echo '</p>';				
	echo "\n";
	echo "\n";
	echo '<ul data-role="listview">';	
	echo "\n";
	
	$holdings=$pxml->records->record[0]->extraRecordData->children('http://oclc.org/srw/extraData');
	$holdings=$holdings->children('urn:oclc-srw:holdings');
	$holdings->registerXPathNamespace('ns3', 'urn:oclc-srw:holdings');
	$results=$holdings->xpath('ns3:datafield');


	$lookuptable=array(
		"E02AA" => "Arts et Architecture",
		"E02AB" => "Arts et Architecture. Grands formats",
		"E02EA" => "Enseignement",
		"E02GS" => "Guichet sciences et techniques",
		"E02GU" => "Accueil de la Bibliothèque",
		"E02HA" => "Sciences et société",
		"E02IB" => "Espace découverte",
		"E02IC" => "Revues. Sciences et société",
		"E02ID" => "Revues. Art et architecture",
		"E02IN" => "Administration bibliothèque. S'adresser au guichet",
		"E02MA" => "Sous-sol. A28-A82",
		"E02MB" => "Sous-sol. B28-B43. Chimie",
		"E02MD" => "Sous-sol. B75-B76. Management",
		"E02ME" => "Sous-sol. B83-B90. Architecture",
		"E02MF" => "Sous-sol. B71. Pédagogie",
		"E02MG" => "Sous-sol. B66-B71. Matériaux",
		"E02MH" => "Sous-sol. B58-B65. Informatique",
		"E02MI" => "Sous-sol. B72. Biologie",
		"E02MJ" => "Sous-sol. B44-B57. Physique",
		"E02ML" => "Sous-sol. B77-B81. Sciences criminelles",
		"E02MM" => "Sous-sol. B91-B92. Transports",
		"E02MN" => "Sous-sol. B93-B94. Topométrie",
		"E02MO" => "Sous-sol. B92-B93. Photogrammétrie",
		"E02MP" => "Sous-sol. A83-A98. Monographies",
		"E02OL" => "EL Electronic Library",
		"E02PA" => "Sous-sol. C73-C124",
		"E02PB" => "Sous-sol. C32-C57. Périodiques chimie",
		"E02PC" => "Sous-sol. C1-C31. Périodiques mathématiques",
		"E02PE" => "Sous-sol. B108-B117. Périodiques architecture",
		"E02PG" => "Sous-sol. B121-B122. Périodiques matériaux",
		"E02PJ" => "Sous-sol. C58-C72. Périodiques physique",
		"E02PL" => "Sous-sol. B123-B125. Périodiques sciences criminelles",
		"E02PQ" => "Sous-sol. B118. Périodiques SHS",
		"E02RA" => "Sciences et Techniques",
		"E02RB" => "Mathématiques",
		"E02RC" => "Mathématiques. Périodiques",
		"E02SA" => "Sous-sol. B103-B107. Thèses et trav.dipl. EPFL",
		"E02SB" => "Sous-sol. B102. Thèses chimie UNIL",
		"E02SD" => "Sous-sol. B73-B74. Grands formats",
		"E02SE" => "Sous-sol. B102. Diplômes chimie",
		"E02SG" => "Sous-sol. B100-B101. Thèses, trav.dipl. et prépublications",
		"E02SP" => "Sous-sol. B97-B99. Polycopiés",
		"E02XA" => "Sous-sol. A101-106. Dépôt légal",
		"E02XB" => "Sous-sol. A109-A110. Fonds XIXe. S'adresser au guichet",
		"E02XC" => "Sous-sol. A111-A114. Fonds spéciaux. S'adresser au guichet",
		"E02XE" => "Sous-sol. A116-A121. Divers. S'adresser au guichet",
		"E02XF" => "Sous-sol. N4-N17. Grands formats. S'adresser au guichet",
		"E02XG" => "Sous-sol. Stock",
		"E02ZA" => "Dépôt externe. Fonds réservé IGAT. Prêt et consultation exclus",
		"E02ZB" => "Dépôt externe. Faculté des Sciences de la vie",
		"E02ZC" => "Dépôt externe. IPSB-LCB. Prêt et consultation exclus",
		"LEXT" => "LEXT Livre extérieur",
		"LIPR" => "Livres anciens. Sur demande"
	);
	
	foreach ($results as $item) {
		if (   (getHoldingField($item,'B')==$network && $library==false) 
		    || (getHoldingField($item,'b')==$library && $library==true) 
			|| ($network==false && $library==false) 
		) {//display only nebis item or only e02 item if epfbibonly is checked
		
			//transform language to three letters language name for nebis
			switch ($language) {
				case 'fr' : 
					$lang3='fre';
					break;
				case 'en' :
					$lang3='eng';
					break;
				default:
					$lang3='eng';
			}
							
			
			echo '<li>';
			
            $urlNebis="http://library.epfl.ch/";
            if($language=='en') {
                $urlNebis.="en/"; 
            }
            $urlNebis.="nebis/?record=";
            $urlNebis.=$nebis_system_number;
            
            echo '<a href="'.$urlNebis.'" rel="external" target="_blank">';
			
						
			echo '<h3>';
				
			
			echo getHoldingField($item,'0');
			echo '</h3>';
			echo '<p><strong>';
			if (getHoldingField($item,'b')=='E02') {
				$location=getHoldingField($item,'c');
				if (in_array($location, array_keys($lookuptable))) {
					echo $lookuptable["$location"]; //lookup table more up-to-date than swissbib for E02
				} else {
					echo getHoldingField($item,'1'); //if some locations are not defined in the look-up table
				}
			} else {
				echo getHoldingField($item,'1');
			}
			
			echo '</strong></p>';
			
			echo '<p>';
			$secondCallNumber=getHoldingField($item,'s');
			if ($secondCallNumber) { 
				echo $secondCallNumber; //2nd call number (to be displayed first as in nebis)				
				echo ' ';					
			}
						
			echo getHoldingField($item,'j'); //call number
			echo '</p>';
			echo '</a>';
			echo '</li>';
			echo "\n";
		}
	}			
	
	echo '</ul>';			
			
			

}




?>
